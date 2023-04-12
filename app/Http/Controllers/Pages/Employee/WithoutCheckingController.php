<?php

namespace App\Http\Controllers\Pages\Employee;

use App\Contracts\Users\WithoutCheckingChangesUsers;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;

class WithoutCheckingController extends Controller
{
    public function __invoke(Employee $employee, WithoutCheckingChangesUsers $withoutCheckingChanger): RedirectResponse
    {
        $withoutCheckingChanger->change($employee);
        toastSuccess('№ ' . $employee->id . ' списка работников успешно изменен!');
        return redirect()->route('employees.index');
    }
}
