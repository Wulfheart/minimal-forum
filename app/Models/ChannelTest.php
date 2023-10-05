<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\TopicCreatedEvent;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
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
}
