<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            's_name' => 'Super',
            'name' => 'User',
            'p_name' => 'Admin',
            'email' => 'kerei.khan@mail.ru',
            'password' => bcrypt('Web2Cash2022Web2Cash'),
            'type' => UserType::ADMIN,
            'is_active' => true
        ]);
    }
}
