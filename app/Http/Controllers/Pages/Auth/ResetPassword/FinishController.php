<?php

namespace App\Http\Controllers\Pages\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinishController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $token = $request->get('token');
        $user = User::query()
            ->where('remember_token', $token)
            ->first();

        if (!$user) {
            toastError(
                'Ваша ссылка на восстановления пароля больше не активна. Пройдите заново процедуру восстановления пароля'
            );
            return redirect()->route('reset_password');
        }

        $ar = [];
        $ar['title'] = 'Форма восстановление пароля';
        $ar['token'] = $token;

        return view('pages.auth.reset_password_finish', $ar);
    }

    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        $token = $request->get('token');
        $user = User::query()
            ->where('remember_token', $token)
            ->first();

        if (!$user) {
            toastError(
                'Ваша ссылка на восстановления пароля больше не активна. Пройдите заново процедуру восстановления пароля'
            );
            return redirect()->route('reset_password');
        }

        $user->update([
            'password' => Hash::make($request->get('password'))
        ]);

        toastSuccess(
            'Пароль изменен. Войдите в кабинет используя Ваш новый пароль'
        );

        return redirect()->route('login');
    }
}
