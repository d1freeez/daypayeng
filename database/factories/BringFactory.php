<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BringFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->name(),
            'company_address' => $this->faker->address(),
            'company_number' => $this->faker->word(),
            'company_email' => $this->faker->unique()->safeEmail(),
            'employees_count' => $this->faker->randomNumber(),
            'where_did_you_hear' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
