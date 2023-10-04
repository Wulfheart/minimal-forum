<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Topic;
use App\ValueObjects\NexusName;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TopicFactory extends Factory
{
    protected $model = Topic::class;

    public function definition(): array
    {
        return [
            'title' => NexusName::fromString($this->faker->word()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'channel_id' => Channel::factory(),
        ];
    }
}
