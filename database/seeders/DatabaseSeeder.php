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
        $users = User::factory(9)->create();
        User::create([
            'fullname' => 'Sarah Basira',
            "email" => "sara.basir98@gmail.com",
            'username' => "Yuna",
            'role' => 'writer',
            'password' => "122334"
        ]);
        User::create([
            'fullname' => 'Oka Bhaskara',
            "email" => "okabas1298@gmail.com",
            'username' => "Oka",
            'role' => 'reader',
            'password' => "122334"
        ]);
        User::create([
            'fullname' => 'Sarah Marc',
            "email" => "sarah.marc@gmail.com",
            'username' => "Sarahid",
            'role' => 'superadmin',
            'password' => "122334"
        ]);

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
        Categories::create([
            "name" => "Random",
            "slug" => "random",
        ]);

        // // Create blogs by recycling existing categories
        $blogs = Blogs::factory(10)->recycle([Categories::all(), User::all()])->create();

        // // Create comments by recycling existing users and blogs
        // Comments::factory(120)->recycle([$users, $blogs])->create();
        // Comments::factory(120)->recycle($users)->recycle($blogs)->create();

        // Comments::factory(120)->recycle(User::factory(50)->create())->recycle(Blogs::factory(20)->recycle(Categories::factory(5)->create())->create())->create();

        // Comments::factory(1000)->recycle([
        //     User::factory(350)->create(), 
        //     Blogs::factory(50)->recycle(Categories::all())->create()])->create();
    }
}
