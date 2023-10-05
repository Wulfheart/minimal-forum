<?php

declare(strict_types=1);

namespace App\Models;

use PHPUnit\Framework\Attributes\CoversClass;
use Tests\TestCase;


#[CoversClass(Hub::class)]
final class HubTest extends TestCase
{
    public function test_channels_relation(): void
    {
        $hub = Hub::factory()->hasChannels(2)->create();

        $hub = Hub::withCount('channels')->find($hub->id);

        $this->assertEquals(2, $hub->channels_count);
    }

}
