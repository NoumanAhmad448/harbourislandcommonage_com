<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LandCreate;
use App\Rules\NameRules;
use App\Actions\Fortify\CreateNewUser;
use App\Models\CreateLand;
use App\Helpers\FileUpload;
use App\Mail\LandCreateEmail;
use App\Models\LandFile;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class LandCreateController extends Controller
{
    private $createNewUser;
    private $email;
    public function __construct() {
        $this->createNewUser = new CreateNewUser;
        $this->email = config("form.email");

    }
    public function landSave(LandCreate $request)
    {
        php_config();
        $createLandObj = new CreateLand();
        $landFileObj = new LandFile;
        $fileUplaodObj = new FileUpload;
        try {
            $request->validated();
            $user = $this->createNewUser->createUser($request->all());

            $createLand = $createLandObj->insert($user,$request->all());
            if(config("setting.en_land_reg_file") && $request->file(config("setting.land_reg_file_upload"))){
                $uploaded_records = $fileUplaodObj->upload($request->file(config("setting.land_reg_file_upload")),
                    config("table.land_create").'_id', $createLand->id
                );
                $landFileObj->insertRecords($uploaded_records);
            }
            if(config("setting.send_land_email")){
                // mailer(config("mail.default"))->
                Mail::to($user->email)->send(new LandCreateEmail($user->name,
                $user->email, $createLand,
                __("messages.land_reg_mail_sub")));
            }

            return response()->json([config("setting.is_success") => true,
                config("setting.message") => __("messages.land_reg_msg")],config("setting.status_200"));

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
