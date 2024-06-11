<?php

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Rules\IsScriptAttack;
use App\Rules\NameRules;

if (!function_exists('check_input')){
     function check_input($u_input ){
        return htmlspecialchars(trim(stripslashes($u_input)));
    }
}


if (!function_exists('is_xss')){
     function is_xss($u_input ){
        return strip_tags($u_input) !== $u_input;
    }
}

if (!function_exists('reduceCharIfAv')){
    // reduce character in string if there is any available
     function reduceCharIfAv($u_input,$limit){
        return  strlen($u_input) > $limit ? \Illuminate\Support\Str::limit($u_input,$limit) : $u_input;
    }
}

if (!function_exists('reduceWithStripping')){
     function reduceWithStripping($u_input,$limit){
            $u_input = strip_tags($u_input);
        return  strlen($u_input) > $limit ? \Illuminate\Support\Str::limit($u_input,$limit) : $u_input;
    }
}

if (!function_exists('removeSpace')){
     function removeSpace($input){
         if(is_string ($input)){
             return  trim($input);
         }
         return $input;
    }
}

if (!function_exists('isAdmin')){
     function isAdmin(){
        return Auth::user()->is_admin ?? abort(403);
    }
}


if (!function_exists('showLessText')){
     function showLessText($text,$len){
         if(strlen($text) > $len){
             return substr($text,$len);
         }
         return $text;
    }
}

if (!function_exists('dateFormat')){

    function dateFormat($value){
       return Carbon::parse($value)->format('Y-m-d');
   }
}
if (!function_exists('php_config')){

    function php_config(){
        if(config("app.debug")){
            dump("memory_limit =>".ini_get("memory_limit"));
            dump(config("setting.dash_lines"));
            dump("upload_max_filesize =>".ini_get("upload_max_filesize"));
            dump(config("setting.dash_lines"));
        }
        ini_set('memory_limit','8096M');
        ini_set('upload_max_filesize','2000M');
   }
}
if (!function_exists('server_logs')){
    function server_logs($e=array(),$request=array(), $config=false, $response_status='',
            $return_response=true){
        if(empty($response_status)){
            $response_status=config("setting.err_500");
        }
        if(config("app.debug")){
            if(count($e) > 1 && $e[0]){
                dump($e[1]->getMessage());
                dump(config("setting.dash_lines"));
            }
            if(count($request) > 1 && $request[0]){
                dump($request[1]->all());
                dump(config("setting.dash_lines"));
            }
            if($config){
                dump("memory_limit".ini_get("memory_limit"));
                dump(config("setting.dash_lines"));
                dump("upload_max_filesize=>".ini_get("upload_max_filesize"));
                dump(config("setting.dash_lines"));
            }
        }else if($return_response){
            return response()->json([config("setting.error"), __("messages.err_msg"),$response_status]);
        }
   }
}
if (!function_exists('failValidation')){
    function failValidation($validator): void {
        try{
            $errors = $validator->errors();
        }catch(AccessDeniedHttpException $e){
            $errors =  config("setting.ad");
            if(config("app.debug")){
                dump($validator->errors());
            }
        }
        throw new HttpResponseException(response()->json([config("setting.error") => $errors],
                    config("setting.err_422"),
        ));
    }
}
