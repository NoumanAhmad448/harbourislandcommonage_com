<?php

use Illuminate\Support\Facades\Facade;
// config("setting.err_500")

$css_folder = "css";
$js_folder = "js";
$layout_folder = "layouts";


return [
    "body" => $layout_folder.".body",
    "default_desc" => "Default Description",
    "app_css" => $css_folder."/app.css",
    "common_functions" => $js_folder."/common_functions.js",
    "welcome" => "welcome",
    "is_success" => "is_success",
    "error" => "error",
    "dash_lines" => "-----------------------",
    "err_500" => 500,
];