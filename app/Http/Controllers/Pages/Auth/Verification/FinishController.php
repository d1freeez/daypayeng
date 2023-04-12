<?php

namespace App\Http\Controllers\Pages\Auth\Verification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FinishController extends Controller
{
    public function __invoke(Request $request): View|RedirectResponse
    {
        $user = User::query()
            ->where('email_token', $request->get('token'))
            ->first();

        if (!$user) {
            toastError(
                'Ваша ссылка больше не активна. Пройдите процедуру регистрации сначала'
            );
            return redirect()->route('register');
        }

        if ($user->getAttribute('verified')) {
            toastSuccess(
                'Ваш почта уже подтверждена. Пожалуйста войдите свой аккаунт'
            );
            return redirect()->route('login');
        }

        $user->update([
            'verified' => true,
            'email_token' => null
        ]);

        return view('pages.auth.email_verified', [
            'title' => 'Почта подтверждена'
        ]);
    }
}
