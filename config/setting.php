<?php

use Illuminate\Support\Facades\Facade;
// config("setting.err_500")

$css_folder = "css";
$js_folder = "js";
$layout_folder = "layouts";
$public_folder = "public/";
$images_folder = "images/";

if(config("app.env") == 'production'){
    $js_folder = $public_folder.$js_folder;
    $css_folder = $public_folder.$css_folder;
}

return [
    "body" => $layout_folder.".body",
    "default_desc" => "Default Description",
    "app_css" => $css_folder."/app.css",
    "app_js" => $js_folder."/app.js",
    "common_functions" => $js_folder."/common_functions.js",
    "welcome" => "welcome",
    "is_success" => "is_success",
    "error" => "error",
    "dash_lines" => "-----------------------",
    "err_500" => 500,
    "favicon" => $public_folder.$images_folder."favicon.ico",
    "email" => "harbourislandcommonage@gmail.com",
    "phone_num" => "1-242-805-5687",
    "address" => "North Eleuthera Regatta Association (NERA)",
    "link" => "no-underline hover:underline text-blue-900",
    "im_wel" => $public_folder.$images_folder."wel.jpg",
];