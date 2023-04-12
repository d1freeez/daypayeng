<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FaqParentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'is_legal' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
