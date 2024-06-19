<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLogin;
use App\Models\LandFile;
use App\Helpers\FileUpload;
use App\Models\CreateLand;
use App\Actions\Fortify\VerifyUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller{
    private $createLandObj;
    private $landFileObj;
    private $fileUplaodObj;
    private $user;
    private $verifyUser;


    public function __construct() {
        $this->createLandObj = new CreateLand();
        $this->user = new User();
        $this->landFileObj = new LandFile;
        $this->fileUplaodObj = new FileUpload;
        $this->verifyUser = new VerifyUser;

    }
    public function login(Request $request)
    {
        try {
            $user = auth()->user();
            if($user && ($user->is_super_admin || $user->is_admin)){
                return redirect()->route("admin_chart");
            }
            else if($user){
                return redirect()->route("index");
            }
            return view(config("setting.admin_login"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function logout(Request $request) {
        try {
            if($this->verifyUser->logout($request)){
                return redirect()->route("admin_login", [],config("setting.err_301"));
            }else{
                return redirect()->route("index", [],config("setting.err_301"));
            }
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
    public function lands(Request $request)
    {
        try {
            $data = [];
            $users = $this->user->getIds();

            $lands = CreateLand::whereIn(config("table.user_id"), $users);
            $lands = $lands->showQuery();
            $lands = $lands->get();
            $data[config("table.lands")] = $lands;
            $data[config("table.title")] = __("messages.lands");
            // dd($data[config("table.lands")]);
            return view(config("setting.admin_lands"), compact("data"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
