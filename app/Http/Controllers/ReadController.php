<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleRoutes;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Resources\RouteResource;
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

        return response()->json([RouteResource::collection($routes), 'Route fetched.']);

    }

    public function getRouteData($routeId)
    {
        //return response()->json($routeId);
        
        $route = Route::find($routeId);
        if (is_null($route)) {
            return response()->json('Data not found', 404); 
        }

        return response()->json([new RouteResource($route)]);

    }
}
