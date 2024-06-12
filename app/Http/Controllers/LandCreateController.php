<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LandCreate;
use App\Rules\NameRules;
use App\Actions\Fortify\CreateNewUser;
class LandCreateController extends Controller
{
    private $createNewUser;
    public function __construct() {
        $this->createNewUser = new CreateNewUser;
    }
    public function landSave(LandCreate $request)
    {
        php_config();
        try {
            $request->validated();
            dump($request->all());
            $user = $this->createNewUser->createUser($request->all());
            dd("hit");

        } catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function landSaveAPI(LandCreate $request)
    {
        php_config();
        if ($request->ajax()){
            try {
                return view(config("setting.land_create"));
            } catch (\Exception $d) {
                return server_logs($e = [true, $d], $request = [true, $request], $config = true);
            }
        } else {
            abort(403);
        }
    }

    public function landCreate(Request $request)
    {
        try {
            return view(config("setting.land_create"));
            } catch (\Exception $d) {
                return server_logs($e = [true, $d], $request = [true, $request], $config = true);
            }
    }
}
