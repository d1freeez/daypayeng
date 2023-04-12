<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FeedbackFactory extends Factory
{
    public function definition(): array
    {
        return [
            's_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'p_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'file_path' => $this->faker->word(),
            'answered' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
