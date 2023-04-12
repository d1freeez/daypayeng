<?php

namespace App\Actions\Employee;

use App\Contracts\Employee\UpdatesEmployees;
use App\Helper\HasCredentials;
use App\Models\Employee;

class UpdateEmployee implements UpdatesEmployees
{
    use HasCredentials;

    /**
     * @inheritDoc
     */
    public function update(Employee $employee, array $credentials): Employee
    {
        $credentials = $this->fullNameCredential($credentials);
        $employee->update($credentials);
        $this->updatePassword($employee, $credentials);
        return $employee;
    }
}
