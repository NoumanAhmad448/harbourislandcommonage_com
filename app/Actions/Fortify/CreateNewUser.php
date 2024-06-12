<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return $this->CreateUser($input=$input);
    }

    public function createUser(array $input): User{
        $data = $input;
        if(!$input[config("form.name")] && $input[config("form.first_name")]){
            $data[config("form.name")] = $input[config("form.first_name")]." ".$input[config("form.lastname")];
        }
        $data[config("form.password")] = Hash::make($input[config("form.password")]);
        return User::create($data);
    }
}
