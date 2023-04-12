<?php

namespace App\Http\Requests;

use App\Rules\FullNameRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
                new FullNameRule()
            ],
            'email' => 'required|email|unique:users,email,' . auth()->id() . ',id',
            'password' => 'nullable|string|alpha_num|min:6|max:255'
        ];
    }
}
