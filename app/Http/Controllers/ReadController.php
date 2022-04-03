<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleRoutes;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Resources\SimpleRoute;

class ReadController extends Controller
{
    public function __construct()
    {

    }

    public function getRoutes()
    {
        return new SimpleRoutes(Route::all());

        //return response()->json(Route::all());
    }

    public function getRouteData($routeId)
    {
        return response()->json($routeId);
    }
}
