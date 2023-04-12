<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Director;
use App\Models\Employee;
use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class LibCompaniesTableSeeder extends Seeder
{
    public function run()
    {
        LibCompany::factory(5)
            ->has(Director::factory(), 'director')
            ->has(
                Employee::factory()->for(
                    Department::factory()->for(
                        Manager::factory(), 'manager'
                    ),
                    'department'
                ),
                'employees'
            )->create();
    }
}
