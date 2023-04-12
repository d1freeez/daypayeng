<?php

namespace Database\Factories;

use App\Models\ProductionCalendar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HolidayFactory extends Factory
{
    public function definition(): array
    {
        return [
            'day_number' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'calendar_id' => ProductionCalendar::factory(),
        ];
    }
}
