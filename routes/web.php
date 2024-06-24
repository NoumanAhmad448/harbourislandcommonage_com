<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandCreateController;
use App\Http\Controllers\SuperAdmin;

$land_path = '/land';
$admin_path = '/admin';

Route::get('/test', function(){
    return "test";
})->name('test-url');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/login', [HomeController::class, 'login'])->name('login');

// for login route checkout fortifyserviceprovider class boot method

Route::prefix($land_path)->group(function () {
    $land_create_route = '/create';
    $land_update_route = '/{land}';
    $land_blk_update = 'blk_update';
    Route::middleware("auth")->get('/', [LandCreateController::class, 'land'])->name('land_index');
    Route::get($land_create_route, [LandCreateController::class, 'landCreate'])->name('land_create');
    Route::post($land_create_route, [LandCreateController::class, 'landSave'])->name('land_save');
    Route::get($land_update_route, [LandCreateController::class, 'landUpdateShow'])->name('land_updateshow');
    Route::patch($land_blk_update, [LandCreateController::class, 'landUpdateBulk'])->name('land_update_blk');
    Route::patch($land_update_route, [LandCreateController::class, 'landUpdate'])->name('land_update');
    Route::delete($land_update_route, [LandCreateController::class, 'landDelete'])->name('land_delete');
});
Route::prefix($admin_path)->group(function (){
    Route::get('/login', [Admin::class, 'login'])->name('admin_login');
    Route::post('/logout', [Admin::class, 'logout'])->name('admin_logout');
    Route::post('/login', [Admin::class, 'adminLogin'])->name('admin_login_post');
});
Route::prefix($admin_path)->middleware(config("middlewares.admin"))->group(function (){
    Route::get('/chart', [Admin::class, 'chart'])->name('admin_chart');
    Route::get('/lands', [Admin::class, 'lands'])->name('admin_lands');
});

Route::prefix($admin_path)->middleware(config("middlewares.super_admin"))->group(function (){
    Route::get('/sub-admins', [SuperAdmin::class, "subAdmin"])->name('create_admin');
    Route::delete('/sub-admins', [SuperAdmin::class, "DelsubAdmin"])->name('del_create_admin');
    Route::patch('/sub-admins', [SuperAdmin::class, "UpdatesubAdmin"])->name('updt_create_admin');
});
