<?php

namespace App\Http\Controllers\Pages\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display all card change applications.
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('viewAny', Application::class);
        return view('pages.application.index', [
            'title' => 'List of applications to change the card',
            'items' => Application::with('user')->latest()->paginate(24)
        ]);
    }

    /**
     * Display a one card change application.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Application $application): View
    {
        $this->authorize('view', $application);
        return view('pages.application.show', [
            'title' => 'Просмотр элемента #' . $application->id . ' из списка заявок на смену карты',
            'item' => $application
        ]);
    }

    /**
     * Delete a card change application.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Application $application): RedirectResponse
    {
        $this->authorize('delete', $application);
        $application->delete();
        toastSuccess('Элемент из списка заявок на смену карты успешно удален.');
        return back();
    }
}
