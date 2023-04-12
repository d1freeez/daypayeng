<?php

namespace App\Http\Requests\FAQ;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', new Faq());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'parent_id' => 'required|numeric|exists:faq_parents',
            'is_legal' => 'required|boolean'
        ];
    }
}
