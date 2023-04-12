<?php

namespace App\Http\Controllers\Pages\RequestAdvance;

use App\Contracts\AdvanceAccount\CreatesRequestAdvances;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAdvance\StoreRequest;
use App\Models\AdvanceAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        return view('pages.request-advance.index', [
            'title' => 'Список запросов на выплату',
            'items' =>
                AdvanceAccount::query()
                    ->filter()
                    ->filterByRole()
                    ->onModerate()
                    ->latest()
                    ->paginate()
        ]);
    }

    public function create(): View|RedirectResponse
    {
        if (!User::find(auth()->id())->cards()->exists()) {
            toastError('Для получения выплаты вам нужно добавить карту');
            return redirect()->route('employees.dashboard');
        }
        return view('pages.request-advance.create', [
            'title' => 'Отправить запрос на получение выплаты'
        ]);
    }


    public function store(StoreRequest $request, CreatesRequestAdvances $requestAdvanceCreator): RedirectResponse
    {
        $requestAdvanceCreator->create($request->validated());

        toastSuccess('Ваш запрос был выслан для проверки.');
        return back();
    }
}
