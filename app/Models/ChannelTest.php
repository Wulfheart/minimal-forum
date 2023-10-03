<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\TopicCreatedEvent;
use App\ValueObjects\NexusName;
use App\ValueObjects\PostText;
use Illuminate\Support\Facades\Bus;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;

#[CoversClass(Channel::class)]
final class ChannelTest extends TestCase
{
    public function test_createTopic(): void
    {
        Bus::fake();
        $channel = Channel::factory()->create();
        $user = User::factory()->create();

        $topic = $channel->createTopic(NexusName::fromString("Hallo Welt"), PostText::fromString("This is my text."), $user);

        $topic = $topic->withCount('posts')->first();

        $this->assertDatabaseCount(Topic::class, 1);
        $this->assertDatabaseCount(Post::class, 1);

        $this->assertEquals(1, $topic->posts_count);

        Bus::assertDispatched(TopicCreatedEvent::class);
    }
}
