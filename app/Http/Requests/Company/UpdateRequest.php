<?php

namespace App\Http\Requests\Company;

use App\Models\LibCompany;
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
        return $this->user()->can('update', new LibCompany());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->whereNull('deleted_at')->ignore(request()->company->director->id)
            ],
            'bin' => [
                'required',
                'numeric',
                'digits:12',
                Rule::unique('lib_companies')->ignore(request()->company->id)->whereNull('deleted_at')
            ],
            'rg_date' => 'required|date',
            'full_name' => [
                'required',
                'string',
                'max:255',
                new FullNameRule()
            ],
            'six_day' => 'sometimes|accepted'
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
            'bin' => 'БИН',
            'rg_date' => 'Дата регистрации',
            'full_name' => 'Полное имя'
        ];
    }
}
