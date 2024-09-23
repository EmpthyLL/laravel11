<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 users
        $users = User::factory(5)->create();

        // Create 10 blogs and associate each blog with a random user
        $blogs = Blogs::factory(10)->create();

        // Create 25 comments, randomly assigning them to users and blogs
        for ($i = 0; $i < 25; $i++) {
            Comments::factory()->create([
                'user_id' => $users->random()->id, // Randomly select a user
                'blog_id' => $blogs->random()->id, // Randomly select a blog
            ]);
        }
    }
}