<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'password' => 'required|string|confirmed|alpha_num|min:6|max:255'
        ];
    }
}
