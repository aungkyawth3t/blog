<?php

namespace Database\Seeders;

use App\Models\Blog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $front = Category::create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);
        $back = Category::create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);
        Blog::create([
            'title' => 'frontend post',
            'slug' => 'frontend-post',
            'intro' => 'this is intro',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, incidunt perspiciatis molestiae optio quas accusantium sed dolor deserunt? Deleniti ducimus doloribus eaque debitis ex vel minus sapiente recusandae enim amet!',
            'category_id' => $front->id
        ]);
        Blog::create([
            'title' => 'backend post',
            'slug' => 'backend post',
            'intro' => 'this is intro',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo rem nobis, minus numquam odio dolore voluptatem, fugit distinctio nostrum voluptates ducimus fugiat placeat laborum esse incidunt dolores voluptatum quae impedit!',
            'category_id' => $back->id
        ]);
    }
}
