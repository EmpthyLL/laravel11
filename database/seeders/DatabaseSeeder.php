<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // // Create users
        // $users = User::factory(50)->create();

        Categories::create([
            "name" => "Dear Diary",
            "slug" => "dear-diary",
        ]);
        Categories::create([
            "name" => "Story Time",
            "slug" => "story-time",
        ]);
        Categories::create([
            "name" => "Mental Health",
            "slug" => "mental-health",
        ]);
        Categories::create([
            "name" => "Life",
            "slug" => "life",
        ]);
        Categories::create([
            "name" => "Travel Journal",
            "slug" => "travel-journal",
        ]);
        
        // // Create blogs by recycling existing categories
        // $blogs = Blogs::factory(20)->recycle($categories)->create();

        // // Create comments by recycling existing users and blogs
        // Comments::factory(120)->recycle([$users, $blogs])->create();
        // Comments::factory(120)->recycle($users)->recycle($blogs)->create();

        // Comments::factory(120)->recycle(User::factory(50)->create())->recycle(Blogs::factory(20)->recycle(Categories::factory(5)->create())->create())->create();
        Comments::factory(1000)->recycle([
            User::factory(350)->create(), 
            Blogs::factory(50)->recycle(Categories::all())->create()])->create();
    }
}