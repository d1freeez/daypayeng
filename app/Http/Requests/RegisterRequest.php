<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,deleted_at,NULL|max:255',
            'password' => 'required|confirmed|alpha_num|min:6|max:255',
            'bin' => 'required|numeric|unique:users,deleted_at,NULL|digits:12',
            'rg_date' => 'required|date',
            'full_name' => 'required|max:255',
            'employees_count' => 'nullable|numeric',
            'accept_policy' => 'accepted'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Наименование компании',
            'email' => 'Электронная почта',
            'password' => 'Пароль для входа',
            'bin' => 'БИН',
            'rg_date' => 'Дата регистрации',
            'full_name' => 'Полное имя',
            'employees_count' => 'Примерное кол-во работников',
            'accept_policy' =>
                'согласие на обработку персональных данных и политике конфиденциальности'
        ];
    }
}
