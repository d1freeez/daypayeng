<?php

namespace Database\Factories;

use App\Models\LibRegion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibCityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'region_id' => LibRegion::factory(),
        ];
    }
}
