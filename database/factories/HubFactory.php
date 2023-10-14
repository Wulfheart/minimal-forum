<?php

namespace Database\Factories;

use App\ValueObjects\NexusDescription;
use App\ValueObjects\NexusName;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hub>
 */
class HubFactory extends Factory
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
            'order' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }

    public function withoutDescription(): self
    {
        return $this->state(fn(array $attributes) => ['description' => new NexusDescription(null)]);
    }

    public function withDescription(): self
    {
        return $this->state(fn(array $attributes) => ['description' => new NexusDescription($this->faker->sentence)]);
    }
}
