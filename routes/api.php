<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ReadController;
//use App\Http\Controllers\WriteController;
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

//routes
/*
Route::middleware('auth:sanctum')->get('/routes', [ReadController::class, 'getRoutes']);
Route::post('/routes', [WriteController::class, 'createRoute']);
Route::get('/routes/{routeId}', [ReadController::class, 'getRouteData']);
Route::put('/routes/{routeId}', [WriteController::class, 'updateRoute']);
Route::delete('/routes/{routeId}', [WriteController::class, 'deleteRoute']);
*/



Route::post('/login', [UserController::class, 'index']);

Route::group(['middleware' => 'auth:sanctum'], function(){ 
    //Routes
    Route::resource('/routes', RouteController::class);
    //Waypoint
    Route::resource('/waypoints', WaypointController::class)->only(['store', 'update', 'delete']);
    //trophies
    Route::resource('/trophies', TrophyController::class)->only(['store', 'update', 'destroy']);
    //Media
    Route::resource('/media', MediaController::class)->only(['store', 'update'.'destroy']);
    //Audio
    Route::resource('/audios', AudioController::class)->only(['store', 'update', 'destroy']);
});





