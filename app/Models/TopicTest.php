<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\PostCreatedEvent;
use App\ValueObjects\PostText;
use Carbon\CarbonImmutable;
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

        $topic->loadCount('posts');

        $numPosts = $topic->posts_count;

        $this->assertEquals(25, $numPosts);

        Event::assertDispatched(PostCreatedEvent::class, function (PostCreatedEvent $event) use ($post) {
            return $event->postId === $post->id;
        });
    }

    public function test_posts_are_ordered_ascending(): void
    {
        $topic = Topic::factory()->create();

        $dates = [
            '2023-01-01T12:45:00',
            '2023-01-01T12:00:00',
            '2023-01-02T12:00:00',
            '2022-12-12T10:45:00',
        ];

        foreach ($dates as $date) {
            $createdAt = CarbonImmutable::parse($date);
            Post::factory()->forTopic($topic)->createdAt($createdAt)->create();
        }

        $topic->refresh()->loadMissing('posts')->loadCount('posts');

        for ($i = 1; $i < $topic->posts_count; $i++) {
            /** @var Post $previousPost */
            $previousPost = $topic->posts->offsetGet($i - 1);
            /** @var Post $currentPost */
            $currentPost = $topic->posts->offsetGet($i);

            $this->assertTrue($currentPost->created_at->greaterThan($previousPost->created_at));
        }
    }

    public function test_latest_post(): void
    {
        $topic = Topic::factory()->create();

        $dates = [
            '2023-01-01T12:45:00',
            '2023-01-01T12:00:00',
            '2023-01-02T12:00:00',
            '2022-12-12T10:45:00',
        ];

        foreach ($dates as $date) {
            $createdAt = CarbonImmutable::parse($date);
            Post::factory()->forTopic($topic)->createdAt($createdAt)->create();
        }

        $latestDate = CarbonImmutable::parse('2023-01-02T12:00:00');

        $topic->refresh()->loadMissing('latestPost');

        $this->assertTrue($topic->latestPost->created_at->equalTo($latestDate));
    }
}
