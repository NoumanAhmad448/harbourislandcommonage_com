<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules($verifyReq=false): array
    {
        $rules = ['required', 'string', Password::default()];
        if($verifyReq){
            array_push($rules, 'confirmed');
        }
        return $rules;
    }
}
