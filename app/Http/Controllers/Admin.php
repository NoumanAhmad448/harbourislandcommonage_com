<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLogin;
use App\Models\LandFile;
use App\Helpers\FileUpload;
use App\Models\CreateLand;
use App\Actions\Fortify\VerifyUser;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller{
    private $createLandObj;
    private $landFileObj;
    private $fileUplaodObj;
    private $verifyUser;


    public function __construct() {
        $this->createLandObj = new CreateLand();
        $this->landFileObj = new LandFile;
        $this->fileUplaodObj = new FileUpload;
        $this->verifyUser = new VerifyUser;

    }
    public function login(Request $request)
    {
        try {
            return view(config("setting.admin_login"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function adminLogin(AdminLogin $request)
    {
        try {
            $request->validated();
            $user = $this->verifyUser->verifyUser($request->all(), true);
            if(!$user){
                return response()->json([config("setting.error") => __("messages.login_failed")],
                    config("setting.err_422"));
            }
            $request->session()->regenerate();
            Auth::login($user);
            return response()->json([config("setting.is_success") => true,
                config("setting.message") => __("messages.logged_in")],config("setting.status_200"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function chart(Request $request)
    {
        try {
            return view(config("setting.admin_chart"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
