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


$public_folder = "";
// $public_folder = "public/";
$js_folder = "js";
$css_folder = "css";

$js_path = $public_folder+$js_folder;
$css_path = $public_folder+$css_folder;

mix.js('resources/js/app.js', $js_path)
    .js('resources/js/common_functions.js', $js_path)
    .js('resources/js/main.js', $js_path)
    .postCss('resources/css/app.css', $css_path, [
        //
    ]);
