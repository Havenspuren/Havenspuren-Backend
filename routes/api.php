<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\WaypointController;
use App\Http\Controllers\TrophyController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login', [UserController::class, 'create'])->name('creer');
Route::post('/login', [UserController::class, 'store'])->name('ajouter');

Route::group(['middleware' => 'auth:sanctum'], function(){ 

    Route::resource('/routes', RouteController::class);
    Route::resource('/waypoints', WaypointController::class)->only(['store', 'update', 'delete']);
    Route::resource('/trophies', TrophyController::class)->only(['store', 'update', 'destroy']);
    Route::resource('/media', MediaController::class)->only(['store', 'update'.'destroy']);
    Route::resource('/audios', AudioController::class)->only(['store', 'update', 'destroy']);
});





