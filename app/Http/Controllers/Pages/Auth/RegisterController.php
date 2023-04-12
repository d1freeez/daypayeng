<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Contracts\Company\CreatesCompanies;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.register', [
            'title' => 'Зарегистрировать компанию'
        ]);
    }

    public function store(
        RegisterRequest $request,
        CreatesCompanies $companiesCreator
    ): RedirectResponse
    {
        $companiesCreator->create($request->validated());

        toastSuccess('Компания создана! Вы можете войти в кабинет директора после подтверждение почтового адреса.');
        return redirect()->route('verify-email-sent');
    }
}
