<?php

namespace App\Actions\Department;

use App\Contracts\Department\UpdatesDepartments;
use App\Models\Department;

class UpdateDepartment implements UpdatesDepartments
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
    ): Department {
        $department->update([
            'name' => $credentials['name'],
            'manager_id' => $credentials['manager_id'],
            'company_id' => $credentials['company_id'] ?? null,
            'description' => $credentials['description'] ?? null
        ]);

        return $department;
    }
}
