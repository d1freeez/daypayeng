<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Department;
use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ManagerFactory extends Factory
{
    protected $model = Manager::class;

    public function definition(): array
    {
        return [
            's_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'p_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => UserType::MANAGER,
            'is_active' => true,
            'password' => bcrypt('10504816'),
            'verified' => true,
            'email_token' => Str::random(10),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'company_id' => LibCompany::factory(),
        ];
    }
}
