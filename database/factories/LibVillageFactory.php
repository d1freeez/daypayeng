<?php

namespace Database\Factories;

use App\Models\LibDistrict;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LibVillageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'district_id' => LibDistrict::factory(),
        ];
    }
}
