<?php

namespace Database\Factories;

use App\Models\LibCountry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibRegionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'country_id' => LibCountry::factory(),
        ];
    }
}
