<?php

namespace App\Actions\Department;

use App\Contracts\Department\CreatesDepartments;
use App\Models\Department;
use App\Models\LibCompany;

class CreateDepartment implements CreatesDepartments
{
    /**
     * Create a new department.
     *
     * @param array $credentials
     * @return \App\Models\Department
     */
    public function create(array $credentials): Department
    {
        $company = $this->getCompany($credentials);
        return $company->departments()->create([
            'name' => $credentials['name'],
            'manager_id' => $credentials['manager_id'],
            'description' => $credentials['description'] ?? null
        ]);
    }

    protected function getCompany(array $credentials): LibCompany
    {
        return LibCompany::find(
            array_key_exists('company_id', $credentials)
                ? $credentials['company_id']
                : auth()->user()->company_id
        );
    }
}
