<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\PostCreatedEvent;
use App\ValueObjects\PostText;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(Topic::class)]
final class TopicTest extends TestCase
{
    public function test_comment(): void
    {
        $topic = Topic::factory()->create();

        Event::fake();

        $post = $topic->comment(
            User::factory()->create(),
            new PostText('Hello, world!')
        );

        $numPosts = $topic->loadCount('posts')->posts_count;

        $this->assertEquals(1, $numPosts);

        Event::assertDispatched(PostCreatedEvent::class, function (PostCreatedEvent $event) use ($post) {
            return $event->postId === $post->id;
        });
    }

    public function test_comment_multiple_times(): void
    {
        $topic = Topic::factory()->create();

        Event::fake();

        for ($i = 0; $i < 25; $i++) {
            $post = $topic->comment(
                User::factory()->create(),
                new PostText('Hello, world!')
            );
        }
        $numPosts = $topic->loadCount('posts')->posts_count;

        $this->assertEquals(25, $numPosts);

        Event::assertDispatched(PostCreatedEvent::class, function (PostCreatedEvent $event) use ($post) {
            return $event->postId === $post->id;
        });
    }
}
