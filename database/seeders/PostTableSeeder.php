<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Post::truncate();

        $admin->pages()->saveMany([
            new Post([
                'title' => 'Blog Post 1',
                'slug' => 'blog-post-1',
                'excerpt' => 'Blog Post 1 Excerpt',
                'body' => 'This is about us page'

            ]),
            new Post([
                'title' => 'Blog Post 2',
                'slug' => 'blog-post-2',
                'excerpt' => 'Blog Post 2 Excerpt',
                'body' => 'This is contact us page'

            ]),
            new Post([
                'title' => 'Blog Post 3',
                'slug' => 'blog-post-3',
                'excerpt' => 'Blog Post 3 Excerpt',
                'body' => 'This is Another Pages'

            ]),
        ]);
    }
}
