<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()->count(15)->create();

        Post::factory()->published()->count(5)->create();

        Post::factory()->draft()->count(5)->create();
    }
}
