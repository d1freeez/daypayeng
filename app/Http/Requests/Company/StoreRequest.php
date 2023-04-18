<?php

namespace App\Http\Requests\Company;

use App\Models\LibCompany;
use App\Rules\BinNotExists;
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
        return $this->user()->can('create', LibCompany::class);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,deleted_at,null',
            'bin' =>
                'required|numeric|digits:12|unique:lib_companies,deleted_at,null',
            'rg_date' => 'required|date',
            'six_day' => 'sometimes|accepted',
            'is_active' => 'sometimes|accepted'
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
            'email' => 'Email',
            'bin' => 'БИН',
            'rg_date' => 'Дата регистрации',
            'full_name' => 'Полное имя'
        ];
    }
}
