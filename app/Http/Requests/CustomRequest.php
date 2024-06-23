<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CustomRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        failValidation($validator);
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     *
     *      */
    public function attributes(): array
    {
        return __("attributes");
    }
}