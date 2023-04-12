<?php

namespace App\Http\Controllers\API\V2\Auth;

use App\Http\Controllers\API\V2\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function store(LoginRequest $request): JsonResponse
    {
        $employee = Employee::query()
            ->where('email', $request->get('email'))
            ->with(['type', 'department', 'company'])
            ->first();

        if (
            !$employee ||
            !Hash::check($request->get('password'), $employee->password)
        ) {
            return $this->errorNotFound('Не правильный email / пароль');
        }

        if (!$employee->is_active) {
            return $this->errorForbidden(
                'Ваш аккаунт не активирован. Извиняемся за неудобства!'
            );
        }

        return $this->respondWithArray([
            'token' => $employee->createToken('mobile-app')->plainTextToken,
            'data' => new EmployeeResource($employee)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request
            ->user()
            ->tokens()
            ->delete();

        return $this->noContent();
    }
}
