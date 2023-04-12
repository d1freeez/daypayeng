<?php

namespace App\Contracts\Employee;

use App\Models\Employee;

interface UpdatesEmployees
{
    /**
     * Update the given employee information.
     *
     * @param \App\Models\Employee $employee
     * @param array $credentials
     * @return \App\Models\Employee
     */
    public function update(Employee $employee, array $credentials): Employee;
}
