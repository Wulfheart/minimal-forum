<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\TopicCreatedEvent;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(Channel::class)]
final class ChannelTest extends TestCase
{
    public function test_createTopic(): void
    {
        Event::fake();
        $channel = Channel::factory()->create();
        $user = User::factory()->create();

        $topic = $channel->createTopic(NexusName::fromString("Hallo Welt"), PostText::fromString("This is my text."), $user);

        $topic = $topic->withCount('posts')->first();

        $this->assertDatabaseCount(Topic::class, 1);
        $this->assertDatabaseCount(Post::class, 1);

        $this->assertEquals(1, $topic->posts_count);

        Event::assertDispatched(TopicCreatedEvent::class);
    }

    public function test_hub_relation(): void
    {
        $hub = Hub::factory()->create();

        $channel = Channel::factory()->forHub($hub)->create();

        $channel->load('hub');

        $this->assertEloquentModelEquals($hub, $channel->hub);
    }

    public function test_topics_relation(): void
    {
        $channel = Channel::factory()->create();
        Topic::factory()->forChannel($channel)->count(2)->create();

        $channel->loadCount('topics');

        $this->assertEquals(2, $channel->topics_count);
    }

    public function test_posts_relation(): void
    {
        $hub = Hub::factory()->create();
        $channel = Channel::factory()->forHub($hub)->create();
        /** @var EloquentCollection<int, Topic> $topics */
        $topics = Topic::factory()->forChannel($channel)->count(3)->create();

        $includedPosts = $topics->map(function ($topic) {
            return Post::factory()->forTopic($topic)->count(2)->create();
        })->flatten();

        $unrelatedChannel = Channel::factory()->forHub($hub)->create();
        /** @var EloquentCollection<int, Topic> $topics */
        $otherTopics = Topic::factory()->forChannel($unrelatedChannel)->count(2)->create();

        $notIncludedPosts = $otherTopics->map(function ($topic) {
            return Post::factory()->forTopic($topic)->count(2)->create();
        })->flatten();

        $channel->loadCount('posts');
        $channel->load('posts');

        $this->assertEquals(6, $channel->posts_count);
        $postCollection = $channel->posts;
        foreach ($includedPosts as $includedPost) {
            $this->assertTrue($postCollection->contains($includedPost));
        }
        foreach ($notIncludedPosts as $notIncludedPost) {
            $this->assertFalse($postCollection->contains($notIncludedPost));
        }
    }

    public function test_latestPost_relation_one_way(): void
    {
        $channel = Channel::factory()->create();
        $topic = Topic::factory()->forChannel($channel)->create();
        $post = Post::factory()->forTopic($topic)->create(['posted_at' => now()->subDay()]);
        Post::factory()->forTopic($topic)->create(['posted_at' => now()->subDays(2)]);


        $channel->load('latestPost');

        $this->assertEloquentModelEquals($post, $channel->latestPost);
    }
    public function test_latestPost_relation_another_way_to_test_for_id_working_correctly(): void
    {
        $channel = Channel::factory()->create();
        $topic = Topic::factory()->forChannel($channel)->create();
        Post::factory()->forTopic($topic)->create(['posted_at' => now()->subDays(3)]);
        $post = Post::factory()->forTopic($topic)->create(['posted_at' => now()->subDays(2)]);


        $channel->load('latestPost');

        $this->assertEloquentModelEquals($post, $channel->latestPost);
    }
}
