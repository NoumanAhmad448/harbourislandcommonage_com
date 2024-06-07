<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandController extends Controller
{
    public function landSave(Request $request)
    {
        php_config();
        if ($request->ajax()) {
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
