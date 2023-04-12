<?php

namespace App\Http\Controllers\Pages\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $ar = [];
        $ar['title'] = 'Форма восстановление пароля';

        return view('pages.auth.reset_password', $ar);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255|exists:users'
        ]);

        $user = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if ($user) {
            $user->setRememberToken(bcrypt($user->email));
            $user->save();

            $user->notify(new ResetPassword());
            toastSuccess(
                'На Ваш почтовый адрес выслана ссылка для восстановления пароля'
            );
        } else {
            toastError('Пользователь не найден');
        }


        return redirect()->route('login');
    }
}
