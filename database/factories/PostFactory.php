<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\User;
use App\ValueObjects\PostText;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var string $text */
        $text = $this->faker->paragraphs($this->faker->numberBetween(1, 5), true);
        return [
            'content' => PostText::fromString($text),
            'user_id' => User::factory(),
            'topic_id' => Topic::factory(),
            'posted_at' => $this->faker->dateTimeBetween(CarbonImmutable::now()->subDays(10)),
        ];
    }

    public function forTopic(Topic $topic): self
    {
        return $this->state(fn(array $attributes) => ['topic_id' => $topic->id]);
    }

    public function forUser(User $user): self
    {
        return $this->state(fn(array $attributes) => ['user_id' => $user->id]);
    }

    public function createdAt(CarbonImmutable $dateTime): self
    {
        return $this->state(fn(array $attributes) => ['created_at' => $dateTime]);
    }
}
