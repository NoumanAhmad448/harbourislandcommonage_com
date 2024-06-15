<?php

use Illuminate\Support\Facades\Facade;
// config("setting.err_500")

$css_folder = "css";
$js_folder = "js";
$layout_folder = "layouts";
$public_folder = "public/";
$images_folder = "images/";
$land_folder = "land/";
$admin_folder = "admin/";

if(config("app.env") == 'production'){
    $images_folder = $public_folder.$images_folder;
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
    "message" => "message",
    "error" => "error",
    "dash_lines" => "-----------------------",
    "status_200" => 200,
    "err_500" => 500,
    "err_422" => 422,
    "err_301" => 301,
    "favicon" => $images_folder."favicon.ico",
    "email" => "harbourislandcommonage@gmail.com",
    "phone_num" => "1-242-805-5687",
    "address" => "North Eleuthera Regatta Association (NERA)",
    "link" => "no-underline hover:underline text-blue-900",
    "im_wel" => $images_folder."wel.jpg",
    "im_glass" => $images_folder."glass.jpeg",
    "im_event" => $images_folder."event.jpg",
    "im_sponsorship" => $images_folder."sponsorship.jpg",
    "im_welcome" => $images_folder."welcome.jpg",
    "im_log" => $images_folder."logo.png",
    "im_log_desc" => "",
    "en_wel" => true,
    "en_typewriter" => true,
    "en_mo_info_con" => true,
    "en_im_glass" => true,
    "en_newsupdates" => true,
    "en_im_event" => true,
    "en_im_sponsorship" => false,
    "en_works" => true,
    "en_footer" => true,
    "en_contact" => true,
    "en_articleadvices" => true,
    "en_articleadvices_con" => true,
    "land_create" => $land_folder."land_create",
    "en_land_display" => true,
    "en_reg_form" => true,
    "land_create_css" => "{$css_folder}/{$land_folder}land_create.css",
    "land_create_js" => "{$js_folder}/{$land_folder}land_create.js",
    "admin_login_js" => "{$js_folder}/{$admin_folder}admin_login.js",
    "svg_toggle" => '',
    "isLoaderLoaded" => false,
    "h2_css" => "pb-3 flex flex-col justify-center items-center mb-4 text-4xl font-extrabold leading-none
        tracking-tight md:text-5xl lg:text-6xl dark:text-white",
    "red_star" => '<span class="red_cross">*</span>',
    "title" => 'title',
    "land_title" => 'Land Title',
    "description" => 'description',
    "land_des" => 'Land Registeration Description',
    "location" => 'location',
    "location_desc" => 'Location/Address',
    "size" => 'size',
    "city" => 'city',
    "country" => 'country',
    "bahmas_country_code" => 17,
    "en_country" => false,
    "app_name" => "harbourislandcommonage.com",
    "en_land_reg_file" => true,
    "land_reg_file_upload" => "file_upload",
    "fuas" => 100,
    "en_gc" => true,
    "ad" => "token is missing in the header",
    "suname" => "Sample UserName",
    "landreg_folder" => "land_register",
    "landreg_multiple" => true,
    "default_timeout" => 5000,
    "default_local" => "local",
    "default_img" => "qUBzTvDUVPxIt38iC3ZkEHbCywdrcTPBn1Gvuz47.jpg",
    "send_land_email" => false,
    "admin_login" => "admin_login",
    "admin_chart" => "admin_chart",
    "admin_body" => $layout_folder.".admin_body",
];