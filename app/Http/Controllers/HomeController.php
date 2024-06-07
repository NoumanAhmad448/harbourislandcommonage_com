<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try {
            $response = $this->indexApi();
            $data = [];
            $features = [
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features1"),"title_desc" =>__("messages.features1_desc")],
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features2"),"title_desc" =>__("messages.features2_desc")],
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features3"),"title_desc" =>__("messages.features3_desc")],
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features4"),"title_desc" =>__("messages.features4_desc")],
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features5"),"title_desc" =>__("messages.features5_desc")],
                ["img"=> url(config('setting.im_event')), "alt"=> __("messages.event") ,"title" => __("messages.features6"),"title_desc" =>__("messages.features6_desc")],
            ];

            $data['features'] = $features;
            return view(config("setting.welcome"), compact("data"));
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
