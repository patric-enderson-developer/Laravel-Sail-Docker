<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(),
            'content' => fake()->paragraphs(4, true),
            'is_published' => fake()->boolean(70),
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => [
            'is_published' => true,
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'is_published' => false,
        ]);
    }
}
