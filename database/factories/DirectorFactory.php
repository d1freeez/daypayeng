<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Department;
use App\Models\Director;
use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DirectorFactory extends Factory
{
    protected $model = Director::class;

    public function definition(): array
    {
        return [
            's_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'p_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => UserType::DIRECTOR,
            'is_active' => $this->faker->boolean(),
            'without_checking' => $this->faker->boolean(),
            'password' => bcrypt('10504816'),
            'verified' => $this->faker->boolean(),
            'email_token' => Str::random(10),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'company_id' => LibCompany::factory()
        ];
    }
}
