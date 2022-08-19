<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => fake()->realText(30),
            'description' => fake()->realText(200),
            'view_count' => fake()->numberBetween(0, 100000),
            'like_count' => fake()->numberBetween(0, 50000),
            'image' => fake()->image('public/images',400,300),
        ];
    }
}
