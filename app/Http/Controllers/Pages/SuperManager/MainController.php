<?php

namespace App\Http\Controllers\Pages\SuperManager;

use App\Contracts\SuperManager\CreatesSuperManagers;
use App\Contracts\SuperManager\UpdatesSuperManagers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuperManager\StoreRequest;
use App\Http\Requests\SuperManager\UpdateRequest;
use App\Models\SuperManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('pages.super_manager.index', [
            'title' => 'Список супер менеджеров',
            'items' => SuperManager::latest()->paginate(24)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('pages.super_manager.create', [
            'title' => 'Создание элемента в список супер менеджеров'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SuperManager\StoreRequest $request
     * @param \App\Contracts\SuperManager\CreatesSuperManagers $superManagerCreator
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request, CreatesSuperManagers $superManagerCreator): RedirectResponse
    {
        $item = $superManagerCreator->create($request->validated());
        toastSuccess('Новый элемент #' . $item->id . ' списка супер менеджеров успешно добавлен');
        return redirect()->route('super-managers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\SuperManager $superManager
     * @return \Illuminate\View\View
     */
    public function edit(SuperManager $superManager): View
    {
        return view('pages.super_manager.update', [
            'title' => 'Изменение элемента #' . $superManager->id . ' из списка супер менеджеров',
            'item' => $superManager
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SuperManager\UpdateRequest $request
     * @param \App\Models\SuperManager $superManager
     * @param \App\Contracts\SuperManager\UpdatesSuperManagers $superManagerUpdater
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        UpdateRequest $request,
        SuperManager $superManager,
        UpdatesSuperManagers $superManagerUpdater
    ): RedirectResponse {
        $item = $superManagerUpdater->update($superManager, $request->validated());
        toastSuccess('Элемент #' . $item->id . ' из списка супер менеджеров успешно изменен');
        return redirect()->route('super-managers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\SuperManager $superManager
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SuperManager $superManager): RedirectResponse
    {
        $superManager->delete();
        toastSuccess('Элемент из списка супер менеджеров успешно удален');
        return redirect()->route('super-managers.index');
    }
}
