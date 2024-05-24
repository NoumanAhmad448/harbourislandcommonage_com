<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try {
            $response = $this->indexApi();
            return view(config("setting.welcome"));
        } catch(\Exception $d){
            return server_logs($e=[true,$d], $request=[false,''],$config=true);
        }
    }
    public function indexApi(){
        try {
            return response()->json([config("setting.is_success")=> true, "data" => '']);
        } catch(\Exception $d){
            return server_logs($e=[true,$d], $request=[false,''],$config=true);
        }
    }
}
