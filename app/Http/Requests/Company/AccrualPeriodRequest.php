<?php

namespace App\Http\Requests\Company;

use App\Models\LibCompany;
use Illuminate\Foundation\Http\FormRequest;

class AccrualPeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('accrualAdvance', new LibCompany());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'start_date' => 'required|date',
            'end_date' => 'required|date'
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
            'start_date' => 'С',
            'end_date' => 'До'
        ];
    }
}
