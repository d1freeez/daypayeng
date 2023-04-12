<?php

namespace App\Http\Controllers\API\V2\Auth;

use App\Http\Controllers\API\V2\BaseController;
use App\Models\Employee;
use App\Notifications\ResetPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResetPasswordController extends BaseController
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|max:255|exists:users'
        ]);

        $user = Employee::query()
            ->where('email', $request->get('email'))
            ->first();

        if ($user) {
            $user->setRememberToken(bcrypt($user->email));
            $user->save();

            $user->notify(new ResetPassword());

            return $this->respondWithMessage(
                'На Ваш почтовый адрес выслана ссылка для восстановления пароля'
            );
        } else {
            return $this
                ->setStatusCode(404)
                ->respondWithError('Пользователь не найден');
        }
    }
}
