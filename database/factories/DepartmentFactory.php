<?php

namespace Database\Factories;

use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'manager_id' => Manager::factory(),
            'company_id' => LibCompany::factory(),
        ];
    }
}
