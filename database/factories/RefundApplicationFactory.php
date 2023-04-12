<?php

namespace Database\Factories;

use App\Models\AdvanceAccount;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class RefundApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'content' => $this->faker->word(),
            'is_refunded' => $this->faker->boolean(),
            'is_finished' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'advance_id' => AdvanceAccount::factory(),
            'user_id' => User::factory(),
        ];
    }
}
