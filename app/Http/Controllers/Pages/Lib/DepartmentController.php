<?php

namespace App\Http\Controllers\Pages\Lib;

use App\Contracts\Department\CreatesDepartments;
use App\Contracts\Department\UpdatesDepartments;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\StoreRequest;
use App\Http\Requests\Department\UpdateRequest;
use App\Models\Department;
use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    /**
     * @var string
     */
    private string $title = 'List of departments';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.lib.department.index', [
            'managers' => Manager::query()
                ->filterByRole()
                ->active()
                ->get(),
            'companies' => LibCompany::query()
                ->active()
                ->get(),
            'items' => Department::query()
                ->with('manager', 'company')
                ->filterByRole()
                ->latest()
                ->paginate(24),
            'title' => 'List of departments'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Department\StoreRequest $request
     * @param \App\Contracts\Department\CreatesDepartments $createsDepartments
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        StoreRequest $request,
        CreatesDepartments $createsDepartments
    ): RedirectResponse {
        $item = $createsDepartments->create($request->validated());
        toastSuccess(
            'Новый элемент №' . $item->id . ' "' . $this->title . '" добавлен'
        );

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Department $department
     * @return \App\Models\Department
     */
    public function show(Department $department): Department
    {
        return $department;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Department\UpdateRequest $request
     * @param \App\Models\Department $department
     * @param \App\Contracts\Department\UpdatesDepartments $updatesDepartments
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        UpdateRequest $request,
        Department $department,
        UpdatesDepartments $updatesDepartments
    ): RedirectResponse {
        $item = $updatesDepartments->update($department, $request->validated());
        toastSuccess(
            'Элемент № ' . $item->id . ' списка "' . $this->title . '" изменен'
        );
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Department $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();
        toastSuccess('Элемент списка "' . $this->title . '" удален');
        return back();
    }
}
