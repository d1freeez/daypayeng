<?php

namespace Database\Factories;

use App\Models\LibCity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibDistrictFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'city_id' => LibCity::factory(),
        ];
    }
}
