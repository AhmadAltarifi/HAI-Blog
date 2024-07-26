<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::create([
            'user_id' => 1,
            'title'=> 'Post Title',
            'content' => 'Post Content'
        ]);

        Post::create([
            'user_id' => 1,
            'title'=> 'Post Title 1',
            'content' => 'Post Content 1'
        ]);

        Post::create([
            'user_id' => 1,
            'title'=> 'Post Title 2',
            'content' => 'Post Content 2'
        ]);
    }
}
