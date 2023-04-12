<?php

namespace App\Http\Requests\ProductionCalendar;

use App\Models\ProductionCalendar;
use Illuminate\Foundation\Http\FormRequest;

class MonthUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', new ProductionCalendar());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'month_number' => 'required|numeric',
            'month_dates' => 'required|numeric',
            'five_working_days' => 'required|numeric',
            'six_working_days' => 'required|numeric'
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
            'month_number' => 'Номер месяца',
            'month_dates' => 'Количество дней',
            'five_working_days' => 'Рабочих дней (пятидневка)',
            'six_working_days' => 'Рабочих дней (шестидневка)'
        ];
    }
}
