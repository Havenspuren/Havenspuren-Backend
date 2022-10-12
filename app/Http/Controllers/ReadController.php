<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleRoutes;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Resources\SimpleRoute;
use Validator;

class ReadController extends Controller
{
    public function __construct()
    {

    }
    public function getRoutes()
    {
        //return new SimpleRoutes(Route::all());
        //return $routes = Route::all();

        $routes = Route::latest()->get();
        return SimpleRoute::collection($routes);
    }

    public function getRouteData($routeId)
    {
        //return response()->json($routeId);
        
        $route = Route::find($routeId);
        if (is_null($route)) {
            return response()->json('Data not found', 404); 
        }
        return new SimpleRoute($route);
    }
}
