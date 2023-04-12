<?php

namespace Database\Factories;

use App\Enums\UserType;
use App\Models\Department;
use App\Models\Employee;
use App\Models\LibCompany;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            's_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'p_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'iin' => $this->faker->numerify('############'),
            'id_number' => $this->faker->numerify(),
            'e_number' => $this->faker->numerify('############'),
            'm_amount' => $this->faker->numberBetween(100000, 1000000),
            'type' => UserType::EMPLOYEES,
            'is_active' => $this->faker->boolean(),
            'without_checking' => $this->faker->boolean(),
            'password' => bcrypt('10504816'),
            'verified' => $this->faker->boolean(),
            'email_token' => Str::random(10),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'company_id' => LibCompany::factory(),
            'department_id' => Department::factory(),
        ];
    }
}
