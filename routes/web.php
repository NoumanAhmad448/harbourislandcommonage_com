<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandCreateController;

$land_path = '/land';

Route::get('/test', function(){
    return "test";
})->name('test-url');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix($land_path)->group(function () {
    $land_create_route = '/create';
    $land_update_route = '/{land}';
    Route::get('/', [LandCreateController::class, 'land'])->name('land_index');
    Route::get($land_create_route, [LandCreateController::class, 'landCreate'])->name('land_create');
    Route::post($land_create_route, [LandCreateController::class, 'landSave'])->name('land_save');
    Route::get($land_update_route, [LandCreateController::class, 'landUpdateShow'])->name('land_updateshow');
    Route::patch($land_update_route, [LandCreateController::class, 'landUpdate'])->name('land_update');
    Route::delete($land_update_route, [LandCreateController::class, 'landDelete'])->name('land_delete');
});
