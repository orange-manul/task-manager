<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'status' => fake()->randomElement(['pending', 'completed']),
        ];
    }
}
