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
    private $createLand;

    public function __construct() {
        $this->createLandObj = new CreateLand();
        $this->user = new User();
        $this->landFileObj = new LandFile;
        $this->fileUplaodObj = new FileUpload;
        $this->verifyUser = new VerifyUser;
        $this->createLand = new CreateLand;
    }
    public function login(Request $request){
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

    public function adminLogin(AdminLogin $request){
        try {
            $request->validated();
            $user = $this->verifyUser->verifyUser($request->all(), true);
            if(!$user){
                return customResponse([config("setting.error") => __("messages.login_failed")],
                    config("setting.err_422"));
            }
            $request->session()->regenerate();
            Auth::login($user);
            return customResponse([config("setting.is_success") => true,
                config("setting.message") => __("messages.logged_in")],config("setting.status_200"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }

    public function chart(Request $request){
        try {
            $data = [];
            $users = User::whereNull(config("table.is_super_admin"))->whereNull(config("table.is_admin"));
            $users = $users->count();
            $data['users'] = $users;

            $lands = CreateLand::count();
            $data['lands'] = $lands;
            debug_logs("users => ".$users);

            $data['title'] = __('messages.summary');

            return view(config("setting.admin_chart"), compact("data"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function lands(Request $request){
        try {
            $data = [];
            $users = $this->user->getIds();
            $lands = $this->createLand->landDetails($users);

            $data[config("table.lands")] = $lands;
            $data[config("table.title")] = __("messages.lands");

            return view(config("setting.admin_lands"), compact("data"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
