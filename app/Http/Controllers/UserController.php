<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandFile;
use App\Helpers\FileUpload;
use App\Models\CreateLand;
use App\Actions\Fortify\VerifyUser;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\MyProfilePatch;
use App\Models\UserProfile;
use mysqli;

class UserController extends Controller
{

    private $createLandObj;
    private $landFileObj;
    private $fileUplaodObj;
    private $user;
    private $verifyUser;
    private $createLand;
    private $createNewUser;

    public function __construct()
    {
        $this->createLandObj = new CreateLand();
        $this->user = new User();
        $this->landFileObj = new LandFile;
        $this->fileUplaodObj = new FileUpload;
        $this->verifyUser = new VerifyUser;
        $this->createLand = new CreateLand;
        $this->createNewUser = new CreateNewUser;
    }
    public function myProfilePatch(MyProfilePatch $request){
        try {
            $request->validated();
            $user = User::find(auth()->user()->id);
            $user->name = $request->name;
            $user->save();
            debug_logs($user);
            UserProfile::saveInsertProfile($request->all());

            return customResponse(
                [
                    config("setting.is_success") => true,
                    config("setting.message") => __("messages.oprntn_succ")
                ],
                config("setting.status_200")
            );
        } catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }

    public function myProfile(Request $request){
        try {
            $data = [];
            $user = auth()?->user();
            debug_logs($user?->userProfile);
            debug_logs($user?->userProfile?->job);
            $data[config("vars.user")] = $user;
            $data[config("vars.title")] = __('messages.mprofile');
            debug_logs("data => ");

            return view(config("setting.my_prfle"), compact(config("vars.data")));
        } catch (\Exception $d) {
            return server_logs($e = [true, $d], $request = [true, $request], $config = true);
        }
    }
}
