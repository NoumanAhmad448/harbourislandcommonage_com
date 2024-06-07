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
$resource_js = `resources/${$js_folder}/`;
$resource_css = `resources/${$css_folder}/`;

mix.js(`${$resource_js}app.js`, $js_path)
    .js(`${$resource_js}common_functions.js`, $js_path)
    .js(`${$resource_js}main.js`, $js_path)
    .js(`${$resource_js}${$land_folder}land_create.js`, $js_path+$land_folder)
    .postCss(`${$resource_css}app.css`, $css_path, [
        //
    ])
    .postCss(`${$resource_css}${$land_folder}land_create.css`, $css_path+$land_folder, [
        //
    ])
    ;
