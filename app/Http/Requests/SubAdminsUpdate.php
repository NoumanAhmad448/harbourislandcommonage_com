<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use App\Rules\NameRules;

class SubAdminsUpdate extends CustomRequest
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
        return isSuperAdmin(false);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $rules = $this->nameRules->adminDelete();
        return $rules;
    }

}

