<?php

namespace Database\Factories;

use App\Models\Hub;
use App\ValueObjects\NexusDescription;
use App\ValueObjects\NexusName;
use Hamcrest\NullDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => NexusName::fromString($this->faker->name),
            'description' => NexusDescription::empty(),
        ];
    }

    public function forHub(Hub $hub): self
    {
        return $this->state(fn(array $attributes) => [
            'hub_id' => $hub->id,
        ]);
    }
}
