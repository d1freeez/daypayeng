<?php

namespace App\Http\Controllers\Pages\Employee;

use App\Contracts\Employee\CreatesEmployees;
use App\Contracts\Employee\UpdatesEmployees;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use App\Models\LibCompany;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BaseController extends Controller
{
    public function index(): View
    {
        return view('pages.employee.index', [
            'title' => 'List of Employees',
            'items' => Employee::filterByRole()->with('company')->filter()->latest()->paginate(24),
            'companies' => LibCompany::all()
        ]);
    }

    public function create(): View
    {
        $auth_user = User::with('company', 'company.departments')->find(auth()->id());
        return view('pages.employee.create', [
            'title' => 'Creating an item in the list of employees',
            'companies' => LibCompany::all(),
            'departments' => $auth_user->type != UserType::ADMIN ? $auth_user->company->departments : null
        ]);
    }

    public function store(StoreRequest $request, CreatesEmployees $employeeCreator): RedirectResponse
    {
        $employeeCreator->create($request->validated());
        toastSuccess('Successfully added');
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee): View
    {
        $auth_user = User::with('company', 'company.departments')->find(auth()->id());
        return view(
            'pages.employee.update', [
                'title' => 'Edit element',
                'companies' => LibCompany::all(),
                'departments' => $auth_user->type != UserType::ADMIN ? $auth_user->company->departments : null,
                'item' => $employee
            ]
        );
    }

    public function update(UpdateRequest $request, Employee $employee, UpdatesEmployees $employeeUpdater): RedirectResponse
    {
        $item = $employeeUpdater->update($employee, $request->validated());
        toastSuccess('Элемент #' . $item->id . ' списка работников успешно изменено');
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        toastSuccess('Элемент списка работников успешно удален');
        return redirect()->route('employees.index');
    }
}
