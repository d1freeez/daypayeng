<?php

namespace Database\Factories;

use App\Models\FaqParent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => $this->faker->word(),
            'answer' => $this->faker->word(),
            'is_legal' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'parent_id' => FaqParent::factory(),
        ];
    }
}
