<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibCompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'rg_date' => Carbon::now()->subYears(4),
            'bin' => $this->faker->numerify('############'),
            'employees_count' => $this->faker->randomNumber(),
            'is_six_day' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
