<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductionCalendarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'month_number' => $this->faker->randomNumber(),
            'month_dates' => $this->faker->randomNumber(),
            'five_working_days' => $this->faker->randomNumber(),
            'six_working_days' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
