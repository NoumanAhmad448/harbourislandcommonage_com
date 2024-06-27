const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 mix.webpackConfig({
    stats: {
         children: true
    }
});


$public_folder = "public/";
$js_folder = "js";
$css_folder = "css";

$js_path = $public_folder+$js_folder;
$css_path = $public_folder+$css_folder;
$land_folder = "land/";
$admin = "admin/";
$land_js = `${$js_path}/${$land_folder}`
$admin_js = `${$js_path}/${$admin}`
$land_css = `${$css_path}/${$land_folder}`

$resource_js = `resources/${$js_folder}/`;
$resource_css = `resources/${$css_folder}/`;

mix.js(`${$resource_js}app.js`, $js_path)
    .js(`${$resource_js}common_functions.js`, $js_path)
    .js(`${$resource_js}main.js`, $js_path)
    .js(`${$resource_js}${$land_folder}land_create.js`, $land_js)
    .js(`${$resource_js}${$admin}admin_login.js`, $admin_js)
    .js(`${$resource_js}${$admin}admin_lands.js`, $admin_js)
    .js(`${$resource_js}${$admin}sub_admins.js`, $admin_js)
    .js(`${$resource_js}login.js`, $js_path)
    .js(`${$resource_js}my_profile.js`, $js_path)
    .js(`${$resource_js}vars.js`, $js_path)
    .postCss(`${$resource_css}app.css`, $css_path, [
        //
    ])
    .postCss(`${$resource_css}${$land_folder}land_create.css`, $land_css, [
        //
    ])
    ;

if (mix.inProduction()) {
    mix.version();
}