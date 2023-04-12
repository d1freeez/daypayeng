<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullNameRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(\p{L})+\s(\p{L})+/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Напишите полное имя. (Формат: Фамилия Имя (Отчество если имеется))';
    }
}
