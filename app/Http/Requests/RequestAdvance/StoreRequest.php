<?php

namespace App\Http\Requests\RequestAdvance;

use App\Models\AdvanceAccount;
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
        return $this->user()->can('create', AdvanceAccount::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:199|max:'.request()->user()->balance,
            'amount_percents' => 'required|numeric|min:299'
        ];
    }
}
