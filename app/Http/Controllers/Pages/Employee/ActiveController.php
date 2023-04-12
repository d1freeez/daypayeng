<?php

namespace App\Http\Controllers\Pages\Employee;

use App\Actions\Users\ActivityChangeUser;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;

class ActiveController extends Controller
{
    public function __invoke(Employee $employee, ActivityChangeUser $activityChanger): RedirectResponse
    {
        $message = $activityChanger->change($employee);
        toastSuccess('Элемент №' . $employee->id . ' списка работников успешно ' . $message);
        return redirect()->route('employees.index');
    }
}
