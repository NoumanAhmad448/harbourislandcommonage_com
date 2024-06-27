<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandFile;
use App\Helpers\FileUpload;
use App\Models\CreateLand;
use App\Actions\Fortify\VerifyUser;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;

class UserController extends Controller{

    private $createLandObj;
    private $landFileObj;
    private $fileUplaodObj;
    private $user;
    private $verifyUser;
    private $createLand;
    private $createNewUser;

    public function __construct() {
        $this->createLandObj = new CreateLand();
        $this->user = new User();
        $this->landFileObj = new LandFile;
        $this->fileUplaodObj = new FileUpload;
        $this->verifyUser = new VerifyUser;
        $this->createLand = new CreateLand;
        $this->createNewUser = new CreateNewUser;

    }

    public function myProfile(Request $request){
        try {
            $data = [];
            $data[config("vars.user")] = auth()->user();
            $data[config("vars.title")] = __('messages.mprofile');
            debug_logs("data => ");

            return view(config("setting.my_prfle"), compact(config("vars.data")));
        }
        catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
