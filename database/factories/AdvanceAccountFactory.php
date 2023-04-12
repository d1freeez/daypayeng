<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AdvanceAccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomNumber(),
            'status' => $this->faker->word(),
            'is_company_accepted' => $this->faker->boolean(),
            'payed_at' => Carbon::now(),
            'is_payed' => $this->faker->boolean(),
            'is_commission_paid' => $this->faker->boolean(),
            'fee' => $this->faker->randomFloat(),
            'reason_rejection' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'from_user_id' => User::factory(),
        ];
    }
}
