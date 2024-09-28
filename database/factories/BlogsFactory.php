<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "category_id" => Categories::all()->random()->id,
            "title" => fake()->words(rand(1, 5), true), // Generates a title with 1 to 5 words
            "body" => fake()->paragraphs(rand(3, 6), true), // Generates a body with 3 to 6 paragraphs
        ];
    }
}
