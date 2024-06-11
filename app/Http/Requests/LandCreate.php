<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use App\Rules\NameRules;

class LandCreate extends FormRequest
{
    private $nameRules;
    public function __construct() {
        $this->nameRules = new NameRules;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        if(!Auth::user()){
            $rules = $this->nameRules->userValidationRules();
        }
        $rules = array_merge($rules,$this->nameRules->landRegVal());
        return $rules;
    }


    /**
     * Get the validation messages
     *
     * @return array
     */
    public function messages()
    {
        $messages = [];
        if(!Auth::user()){
            $messages = $this->nameRules->userValidationMsg();
        }
        return $messages;
    }

    protected function failedValidation(Validator $validator) {
        failValidation($validator);
    }
}

