<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('pages.auth.login', [
            'title' => 'Войти в аккаунт'
        ]);
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::query()
            ->where('email', $request->get('email'))
            ->first();
        if (!$user) {
            toastr('Введенный email не найден!', 'error');
            return back();
        }

        if (!$user->getAttribute('is_active')) {
            toastr(
                'Ваш аккаунт не активирован. Извиняемся за неудобства!',
                'error'
            );
            return back();
        }

        if (!auth()->attempt($request->only('email', 'password'))) {
            toastr('Не правильный email/пароль', 'error');
            return back();
        }

        return redirect()->route('login');
    }

    public function destroy(): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        auth()->logout();

        return redirect()->route('login');
    }
}
