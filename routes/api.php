<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\WriteController;

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

Route::get('/routes', [ReadController::class, 'getRoutes']);
Route::post('/routes', [WriteController::class, 'createRoute']);
Route::get('/routes/{routeId}', [ReadController::class, 'getRouteData']);
Route::put('/routes/{routeId}', [WriteController::class, 'updateRoute']);
Route::delete('/routes/{routeId}', [WriteController::class, 'deleteRoute']);
