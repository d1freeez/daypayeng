<?php

namespace App\Http\Controllers\Pages\Company;

use App\Contracts\Company\CreatesCompanies;
use App\Contracts\Company\UpdatesCompanies;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\LibCompany;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', LibCompany::class);

        return view('pages.company.index', [
            'title' => 'Список компании',
            'items' => LibCompany::query()
                ->with('director')
                ->latest()
                ->paginate(24)
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', LibCompany::class);

        return view('pages.company.create', [
            'title' => 'Создать элемент в список компании'
        ]);
    }

    public function store(
        StoreRequest $request,
        CreatesCompanies $createsCompanies
    ): RedirectResponse {
        $this->authorize('create', LibCompany::class);
        $createsCompanies->create($request->validated());

        toastSuccess(
            'Новый элемент списка компании успешно добавлен!'
        );
        return redirect()->route('companies.index');
    }

    public function edit(LibCompany $company): View
    {
        $this->authorize('update', $company);
        return view('pages.company.update', [
            'title' => 'Редактирование информации о компании',
            'item' => $company
        ]);
    }

    public function update(
        UpdateRequest $request,
        LibCompany $company,
        UpdatesCompanies $updatesCompanies
    ): RedirectResponse {
        $this->authorize('create', $company);
        $updatesCompanies->update($request->validated(), $company);

        toastSuccess('№' . $company->id . ' списка компании успешно изменен!');
        return redirect()->route('companies.index');
    }

    public function destroy(LibCompany $company): RedirectResponse
    {
        $this->authorize('delete', $company);
        $company->delete();

        toastSuccess('Элемент списка компании удален');
        return redirect()->route('companies.index');
    }
}
