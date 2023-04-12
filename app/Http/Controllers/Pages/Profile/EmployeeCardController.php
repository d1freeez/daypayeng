<?php

namespace App\Http\Controllers\Pages\Profile;

use App\Models\Employee;
use App\Services\Freedompay\CardStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeCardController
{
    public function index(): View
    {
        $auth_user = Employee::find(auth()->id());
        return view('pages.employee.profile.cards', [
            'title' => 'Карты работника',
            'card' => $auth_user->cards()->first()
        ]);
    }

    public function store(): RedirectResponse
    {
        $user = Employee::find(auth()->id());
        $storage = new CardStorage();
        $storage
            ->setUserId($user->id)
            ->setBackLink(route('employees.dashboard'))
            ->setPostLink(route('api_add_card'));
        if ($storage->addCard()) {
            return redirect($storage->getServerAnswerParam('redirect_url'));
        }

        abort(405, 'УПС! Пожалуйста сообщите нам об ошибке.');
    }
}
