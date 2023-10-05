<?php

declare(strict_types=1);

namespace App\Models;

use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(Post::class)]
final class PostTest extends TestCase
{
    public function test_topic_relation(): void
    {
        $topic = Topic::factory()->create();
        $post = Post::factory()->forTopic($topic)->create();

        $post->load('topic');

        $this->assertEloquentModelEquals($topic, $post->topic);
    }

    public function test_user_relation(): void
    {
        $topic = Topic::factory()->create();
        $user = User::factory()->create();
        $post = Post::factory()->forTopic($topic)->forUser($user)->create();

        $post->load('user');

        $this->assertEloquentModelEquals($user, $post->user);
    }
}
