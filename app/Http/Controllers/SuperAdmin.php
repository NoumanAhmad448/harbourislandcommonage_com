<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminLogin;
use App\Models\LandFile;
use App\Helpers\FileUpload;
use App\Models\CreateLand;
use App\Actions\Fortify\VerifyUser;
use App\Http\Requests\SubAdminsDelete;
use App\Http\Requests\SubAdminsUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SuperAdmin extends Controller
{
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
    public function subAdmin(Request $request) {
        try {
            $data = [];
            $users = $this->user->getAdmins();
            $data['users'] = $users;
            $data['title'] = __('messages.ap');

            return view(config("setting.sub_admins"), compact("data"));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }

    public function DelsubAdmin(SubAdminsDelete $request){
        try{
            $request->validated();
            $this->user->delAdmins($request->id);
            return customResponse([
                config("setting.is_success") => true,
                config("setting.message") => __("messages.admn_del_op")],
                config("setting.status_200")
            );
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
    public function UpdatesubAdmin(SubAdminsUpdate $request){
        try{
            $request->validated();
            $this->user->passChange($request->id, $request->password);
            return customResponse([
                config("setting.is_success") => true,
                config("setting.message") => __("messages.admn_del_op")],
                config("setting.status_200")
            );
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
