<?php

namespace App\Http\Controllers\API\V2\User;

use App\Http\Controllers\API\V2\BaseController;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    public function show(Request $request): JsonResponse
    {
        return $this->respondWithArray([
            'data' => new EmployeeResource($request->user())
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'nullable|email|max:255',
            'full_name' => 'required|string|max:255',
            'password' => 'nullable|alpha_num|min:6|max:255'
        ]);

        $user = $request->user();
        $user
            ->setFullName($request->get('full_name'))
            ->setPasswordAttribute($request)
            ->setEmail($request)
            ->save();

        return $this->respondWithArray([
            'message' => 'Ваш аккаунт успешно изменен!',
            'data' => new EmployeeResource($user)
        ]);
    }
}
