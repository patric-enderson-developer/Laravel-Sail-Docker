<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()->count(15)->create();           // 15 publicados (padrão)
        Post::factory()->published()->count(3)->create(); // +3 publicados
        Post::factory()->draft()->count(2)->create();     // 2 rascunhos (não aparecem)
    }
}
