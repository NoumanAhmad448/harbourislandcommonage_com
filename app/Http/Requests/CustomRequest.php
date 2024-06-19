<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CustomRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        failValidation($validator);
    }
}