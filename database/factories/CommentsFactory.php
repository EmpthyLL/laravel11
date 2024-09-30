<?php

namespace Database\Factories;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => User::all()->random()->id,  // Reference an existing user
            // 'blog_id' => Blogs::all()->random()->id, // Reference an existing blog
            'user_id' => User::factory(),  // Reference an existing user
            'blog_id' => Blogs::factory(), // Reference an existing blog
            "body" => rand(0, 1) 
                ? fake()->word()  // Generates a single word
                : fake()->sentences(rand(1, 4), true), // Generates 1 to 4 sentences
        ];
    }
}