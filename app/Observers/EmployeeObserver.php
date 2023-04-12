<?php

namespace App\Observers;

use App\Models\Employee;
use App\Notifications\CompanyInvitation;

class EmployeeObserver
{
    /**
     * Handle the employee "created" event.
     */
    public function created(Employee $employee): void
    {
        if (app()->isProduction()) {
            $employee->notify(new CompanyInvitation());
        }
    }

    /**
     * Handle the employee "deleted" event.
     */
    public function deleting(Employee $employee): void
    {
        $employee->accounts()->delete();
        $employee->accruedAdvances()->delete();
        $employee->applications()->delete();
        $employee->cards()->delete();
    }
}
