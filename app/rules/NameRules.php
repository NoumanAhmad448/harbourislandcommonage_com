<?php

namespace App\Rules;

use Illuminate\Validation\Rule;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;

class NameRules
{
    use PasswordValidationRules;
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    public static function nameRules()
    {
        return ['required', 'string',new IsScriptAttack];
    }

    public static function emailRules()
    {
        return ['required','string', 'email', new IsScriptAttack, Rule::unique(User::class)];
    }

    public static function gCaptchaRules()
    {
        return ['required','captcha'];
    }
    public function passRules()
    {
        return $this->passwordRules();
    }
    public function fileRules()
    {
        $allowed_fuas = config("setting.fuas");
        $allowed_fuas = (int)$allowed_fuas*1000;
        $img_val_rules_str = config("form.img_val_rules_str");

        return "required|file|max:{$allowed_fuas}|mimetypes:{$img_val_rules_str}";
    }

    public function userValidationRules(): Array {
        return [
            config("form.first_name") => self::nameRules(),
            config("form.lastname") => self::nameRules(),
            config("form.email") => self::emailRules(),
            config("form.c_password") => $this->passRules(),
            config("form.password") => $this->passRules(),
        ];
    }
    public function landRegVal(): Array {
        $rules = [
            config("setting.title") => self::nameRules(),
            config("setting.description")=> self::nameRules(),
            config("setting.location") => self::nameRules(),
            config("setting.size") => self::nameRules(),
            config("setting.city") => $this->nameRules(),
        ];
        if(config("setting.en_land_reg_file")){
            $rules[config("setting.land_reg_file_upload").".*"] = $this->fileRules();
        }
        if(config("setting.en_country")){
            $rules[config("setting.country")] = self::nameRules();
        }
        if(config("setting.en_gc")){
            $rules[config("form.g-recaptcha-response")] = self::gCaptchaRules();
        }
        return $rules;
    }

    public function userValidationMsg(): Array {
        return [
            config("form.first_name").'.required' => config("validation.required"),
            config("form.lastname").'.required' => config("validation.required"),
            config("form.email").'.required' => config("validation.required"),
            config("form.c_password").'.required' => config("validation.required"),
            config("form.password").'.required' => config("validation.required"),
        ];
    }
    public function landRegValMsg(): Array {
        return [
            config("setting.title").'.required' => config("validation.required"),
            config("setting.description").'.required' => config("validation.required"),
            config("setting.location").'.required' => config("validation.required"),
            config("setting.size").'.required' => config("validation.required"),
            config("setting.city").'.required' => config("validation.required"),
        ];
    }
}
