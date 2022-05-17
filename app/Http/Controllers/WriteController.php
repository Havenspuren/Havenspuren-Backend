<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleRoute;
use Illuminate\Http\Request;
use App\Models\Route;
use Validator;


class WriteController extends Controller
{
    public function __construct()
    {

    }

    public function createRoute(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'path_to_route_image' => 'required',
            'expected_time' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
        ]);

        $route = Route::create([
            'name' => $request->name,
            'description' => $request->description,
            'path_to_route_image' => $request->path_to_route_image,
            'expected_time' => $request->expected_time,
            'path_to_map_image' => $request->path_to_map_image,
            'path_to_character_image' => $request->path_to_character_image
     
         ]);

        return new SimpleRoute($route);
    }

    public function updateRoute(Request $request, $routeId)
    {

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'path_to_route_image' => 'required',
            'expected_time' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
        ]);

        $route = Route::find($routeId);
        $route->name = $request->name;
        $route->description = $request->description;
        $route->path_to_route_image = $request->path_to_route_image;
        $route->expected_time = $request->expected_time;
        $route->path_to_map_image = $request->path_to_map_image;
        $route->path_to_character_image = $request->path_to_character_image;

        $route->fill($validator);
        $route->save();
        
        return response()->json(['Route updated successfully.', new SimpleRoute($route)]);

    }

    public function deleteRoute($routeId)
    {
        $route = Route::find($routeId);
        $route->delete();

        return response()->json('Route deleted successfully');

    }
}
