<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(100000, 999999),
            'content' => fake()->paragraphs(4, true),
            // 80% dos posts ganham imagem, 20% ficam sem (para testar a padrão)
            'featured_image' => fake()->boolean(80)
                ? 'https://picsum.photos/seed/' . fake()->unique()->word() . fake()->unique()->numberBetween(1, 9999) . '/800/600'
                : null,
            'status' => 'published',
            'is_featured' => fake()->boolean(20),
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => ['status' => 'published']);
    }

    public function draft(): static
    {
        return $this->state(fn () => ['status' => 'draft']);
    }

    public function archived(): static
    {
        return $this->state(fn () => ['status' => 'archived']);
    }
}
