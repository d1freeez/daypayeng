<?php

namespace App\Contracts\Department;

use App\Models\Department;

interface CreatesDepartments
{
    /**
     * Create a new department.
     *
     * @param array $credentials
     * @return \App\Models\Department
     */
    public function create(array $credentials): Department;
}
