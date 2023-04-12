<?php

namespace App\Http\Requests\Bring;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'company_name' => 'required|max:255',
            'company_address' => 'max:255',
            'company_number' => 'required|max:255',
            'company_email' => 'required|max:255',
            'employees_count' => 'numeric',
            'where_did_you_hear' => 'max:255'
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
            'company_name' => 'Название компании',
            'company_address' => 'Адрес компании',
            'company_number' => 'Номер компании',
            'company_email' => 'Email компании',
            'employees_count' => 'Примерное кол-во работников',
            'where_did_you_hear' => 'Где вы услышали о нас?'
        ];
    }
}
