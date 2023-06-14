<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteWaypointController;
use App\Http\Controllers\WaypointController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Show Login Form
Route::get('/login', [UserController::class, 'showLoginForm']);

//Login
Route::post('/login', [UserController::class, 'login']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Landingpage
Route::get('/', [IndexController::class, 'showIndex']);

//Routes Overview
Route::get('/routes', [RouteController::class, 'index'])->middleware('auth');;

//Show Create Formular For New Route
Route::get('/routes/create', [RouteController::class, 'create'])->middleware('auth');

//Create New Route
Route::post('/routes', [RouteController::class, 'store'])->middleware('auth');

//Show Route
Route::get('/routes/{route}', [RouteController::class, 'show'])->middleware('auth');

//Show Edit Route Formular
Route::get('/routes/{route}/edit', [RouteController::class, 'edit'])->middleware('auth');

//Update Route 
Route::put('/routes/{route}', [RouteController::class, 'update'])->middleware('auth');

//Delete Route
Route::delete('/routes/{route}', [RouteController::class, 'destroy'])->middleware('auth');

//Waypoints Overview
Route::get('/waypoints', [WaypointController::class, 'index'])->middleware('auth');

//Show Create Formular For New Waypoint
Route::get('/waypoints/create', [WaypointController::class, 'create'])->middleware('auth');

//Create New Waypoint
Route::post('/waypoints', [WaypointController::class, 'store'])->middleware('auth');

//Show Waypoint
Route::get('/waypoints/{waypoint}', [WaypointController::class, 'show'])->middleware('auth');

//Show Edit Waypoint Formular
Route::get('/waypoints/{waypoint}/edit', [WaypointController::class, 'edit'])->middleware('auth');

//Update Waypoint
Route::put('/waypoints/{waypoint}', [WaypointController::class, 'update'])->middleware('auth');

//Delete Waypoint
Route::delete('/waypoints/{waypoint}', [WaypointController::class, 'destroy'])->middleware('auth');

//Show Route-Waypoint-Assignment
Route::get('/routes/{route}/waypoints', [RouteWaypointController::class, 'index'])->middleware('auth');

//Assign Waypoints to Route
Route::post('/routes/{route}/waypoints/assign', [RouteWaypointController::class, 'assign'])->middleware('auth');