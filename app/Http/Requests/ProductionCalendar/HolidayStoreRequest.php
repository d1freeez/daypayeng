<?php

namespace App\Http\Requests\ProductionCalendar;

use App\Models\Holiday;
use Illuminate\Foundation\Http\FormRequest;

class HolidayStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Holiday::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'calendar_id' => 'required|numeric',
            'day_number' => 'required|numeric'
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
            'calendar_id' => 'Выберите месяц',
            'day_number' => 'День'
        ];
    }
}
