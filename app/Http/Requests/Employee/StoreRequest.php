<?php

namespace App\Http\Requests\Employee;

use App\Models\Employee;
use App\Rules\FullNameRule;
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
        return $this->user()->can('create', Employee::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:255|unique:users,deleted_at,NULL',
            'full_name' => [
                'required', 'string', 'max:255', new FullNameRule()
            ],
            'company_id' => 'numeric',
            'department_id' => 'numeric',
            'iin' => 'required|numeric|digits:12',
            'id_number' => 'required|numeric|digits:9',
            'e_number' => 'required|max:255',
            'position' => 'required|max:255',
            'm_amount' => 'required|numeric'
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
            'email' => 'Электронная почта',
            'full_name' => 'Полное имя',
            'iin' => 'ИИН',
            'company_id' => 'Компания',
            'department_id' => 'Отделение',
            'id_number' => 'Номер уд. лич.',
            'e_number' => 'Номер труд. договора',
            'position' => 'Должность',
            'm_amount' => 'Зарплата в месяц'
        ];
    }
}
