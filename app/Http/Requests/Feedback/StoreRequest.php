<?php

namespace App\Http\Requests\Feedback;

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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            's_name' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'p_name' => 'nullable|string|max:255',
            'full_name' => [
                'sometimes', 'string', 'max:255', new FullNameRule()
            ],
            'user_id' => 'nullable|numeric|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'upload_file' => 'nullable|file|max:10000'
        ];
    }
}
