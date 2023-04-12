<?php

namespace App\Http\Controllers\Pages\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SetPasswordController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        $token = $request->get('token');
        $user = User::query()
            ->where('email_token', $token)
            ->first();
        if (!$user) {
            toastError(
                'Ваша ссылка на создание пароля больше не активна. Пройдите процедуру восстановления пароля'
            );
            return redirect()->route('reset_password');
        }

        return view('pages.auth.set_password', [
            'title' => 'Форма создания пароля',
            'token' => $token
        ]);
    }

    public function store(ResetPasswordRequest $request): RedirectResponse
    {
        $token = $request->get('token');

        $user = User::query()
            ->where('email_token', $token)
            ->whereNull('deleted_at')
            ->first();

        if (!$user) {
            toastError(
                'Ваша ссылка на создание пароля больше не активна. Пройдите процедуру восстановления пароля'
            );
            return redirect()->route('reset_password');
        }

        $user->update([
            'password' => Hash::make($request->get('password')),
            'verified' => true,
            'is_active' => true
        ]);
        toastSuccess('Пожалуйста войдите используя пароль');
        return redirect()->route('login');
    }
}
