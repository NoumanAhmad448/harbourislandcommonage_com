<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class FileUpload
{
    private $file_path = "";

    public function __construct() {
        $this->file_path = config("setting.landreg_folder");
    }
    public function upload($files, $key,$value){
        $data = [];
        debug_logs($files);

        if(isArray($files) && count($files) > 0){
            foreach($files as $file){
                array_push($data, $this->uploadFile($file,$key,$value));
            }
        }else{
            $data = $this->uploadFile($files,$key,$value);
        }
        return $data;
    }

    private function uploadFile($file,$key,$value){
        $data = [];
        Storage::makeDirectory($this->file_path, 0775, true);
        debug_logs("in uploadFile");
        debug_logs(gettype($this->file_path));
        debug_logs(gettype($file));
        debug_logs($file);

        $data[config("table.link")] =  config("app.env") == "local" ? "qUBzTvDUVPxIt38iC3ZkEHbCywdrcTPBn1Gvuz47.jpg": Storage::put($this->file_path, $file);
        $data[config("table.f_mimetype")] = $file->getClientMimeType();
        $data[config("table.f_name")] = $file->getClientOriginalName();
        $data[$key] = $value;
        debug_logs($data);
        return $data;
    }
}