<?php

namespace App\Contracts\Department;

use App\Models\Department;

interface UpdatesDepartments
{
    /**
     * Update the given department information.
     *
     * @param \App\Models\Department $department
     * @param array $credentials
     * @return \App\Models\Department
     */
    public function update(
        Department $department,
        array $credentials
    ): Department;
}
