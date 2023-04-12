<?php

namespace App\Http\Requests\Employee;

use App\Models\Employee;
use App\Rules\FullNameRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', Employee::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email,' . request()->employee->id,
            'full_name' => [
                'required',
                'string',
                'max:255',
                new FullNameRule()
            ],
            'company_id' => 'numeric',
            'department_id' => 'numeric',
            'iin' => 'required|numeric|digits:12',
            'id_number' => 'required|numeric|digits:9',
            'e_number' => 'required|max:255',
            'position' => 'required|max:255',
            'm_amount' => 'required|numeric',
            'password' => 'nullable|string|alpha_num|min:6|max:255'
        ];
    }
}
