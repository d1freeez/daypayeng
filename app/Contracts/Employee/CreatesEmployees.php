<?php

namespace App\Contracts\Employee;

use Illuminate\Database\Eloquent\Model;

interface CreatesEmployees
{
    /**
     * Create a new employee.
     *
     * @param array $credentials
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $credentials): Model;
}
