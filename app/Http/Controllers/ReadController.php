<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function __construct()
    {

    }

    public function getRoutes()
    {

    }

    public function getRouteData($routeId)
    {
        return response()->json($routeId);
    }
}
