<?php

namespace App\Http\Controllers\Pages\Lib;

use App\Http\Controllers\Controller;
use App\Models\Bring;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BringController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', Bring::class);
        return view('pages.bring.index', [
            'title' => 'Список приглашении работодателя',
            'items' => Bring::query()->latest()->paginate(24)
        ]);
    }

    public function show(Bring $bring): View
    {
        $this->authorize('view', $bring);
        return view('pages.bring.show', [
            'title' => 'Просмотр #' . $bring->id . ' из списка приглашение работодателя',
            'item' => $bring
        ]);
    }

    public function destroy(Bring $bring): RedirectResponse
    {
        $this->authorize('delete', $bring);
        $bring->delete();
        toastSuccess('Элемент из списка приглашение работодателя успешно удален.');
        return redirect()->route('brings.index');
    }
}
