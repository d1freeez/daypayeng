<?php

namespace App\Http\Requests\Manager;

use App\Models\Manager;
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
        return $this->user()->can('update', new Manager());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'full_name' => [
                'required',
                'string',
                'max:255',
                new FullNameRule()
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(request()->manager->id)->whereNull('deleted_at')
            ],
            'company_id' => 'sometimes|numeric|exists:lib_companies,id'
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
            'full_name' => 'Полное имя',
            'email' => 'Электронная почта'
        ];
    }
}
