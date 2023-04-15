<?php

namespace App\Http\Controllers\Pages\Manager;

use App\Contracts\Manager\CreatesManagers;
use App\Contracts\Manager\UpdatesManagers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\StoreRequest;
use App\Http\Requests\Manager\UpdateRequest;
use App\Models\LibCompany;
use App\Models\Manager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BaseController extends Controller
{
    /**
     * Get the entire list from the Model
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.manager.index', [
            'title' => 'Managers list',
            'items' => Manager::query()->with('company')->filterByRole()->filter()->latest()->paginate(24),
            'companies' => LibCompany::all()
        ]);
    }

    /**
     * Show the form for creating a Model element
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('pages.manager.create', [
            'title' => 'Creating an item in the managers list',
            'companies' => LibCompany::all()
        ]);
    }

    /**
     * Send data to the database to create a model element
     *
     * @param \App\Http\Requests\Manager\StoreRequest $request
     * @param \App\Contracts\Manager\CreatesManagers $managersCreator
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, CreatesManagers $managersCreator): RedirectResponse
    {
        $item = $managersCreator->create($request->validated());
        toastSuccess('New element #' . $item->id . ' has successfully addded');

        return redirect()->route('managers.index');
    }

    /**
     * Show the form for editing a Model element
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\View\View
     */
    public function edit(Manager $manager): View
    {
        return view('pages.manager.update', [
            'title' => 'Edit element at managers list',
            'item' => $manager,
            'companies' => LibCompany::all()
        ]);
    }

    /**
     * Send data to the database to update a model element
     *
     * @param \App\Http\Requests\Manager\UpdateRequest $request
     * @param \App\Models\Manager $manager
     * @param \App\Contracts\Manager\UpdatesManagers $updatesManagers
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Manager $manager, UpdatesManagers $updatesManagers): RedirectResponse
    {
        $item = $updatesManagers->update($manager, $request->validated());
        toastSuccess('Элемент #' . $item->id . ' из списка менеджеров успешно изменен');

        return redirect()->route('managers.index');
    }

    /**
     * Deleting a Model element
     *
     * @param \App\Models\Manager $manager
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Manager $manager): RedirectResponse
    {
        $manager->delete();
        toastSuccess('Element has successfully deleted');

        return redirect()->route('managers.index');
    }
}
