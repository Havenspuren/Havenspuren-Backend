<?php

namespace App\Http\Controllers;

use App\Http\Resources\SimpleRoute;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRouteRequest;
use App\Models\Route;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class WriteController extends Controller
{
    
    public function createRoute(StoreRouteRequest $request)
    {


        // The incoming request is valid...     

        /*
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'path_to_route_image' => 'required',
            'expected_time' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
        ]);

        */
        
        $imageName = Str::random(32).".".$request->path_to_character_image->getClientOriginalExtension();


        $route = Route::create([
            'name' => $request->name,
            'description' => $request->description,
            'path_to_route_image' => $request->path_to_route_image,
            'expected_time' => $request->expected_time,
            'path_to_map_image' => $request->path_to_map_image,
            // we store only the image name in DB
            'path_to_character_image' => $imageName,
         ]);
         
         //save Image in Storag folder
         Storage::disk('public')->put($imageName, file_get_contents($request->path_to_character_image));

        //return new SimpleRoute($route);

        //return Json Response
        return response()->json([
            'message' => 'Route successfully created.'
        ], 200);
    }

    public function updateRoute(StoreRouteRequest $request, $routeId)
    {


        // The incoming request is valid...
        
        /*
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'path_to_route_image' => 'required',
            'expected_time' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
        ]);
        */

        $route = Route::find($routeId);
        $route->name = $request->name;
        $route->description = $request->description;
        $route->path_to_route_image = $request->path_to_route_image;
        $route->expected_time = $request->expected_time;
        $route->path_to_map_image = $request->path_to_map_image;
        $route->path_to_character_image = $request->path_to_character_image;


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
