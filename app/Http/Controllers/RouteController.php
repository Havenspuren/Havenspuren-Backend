<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RouteResource;
use App\Http\Requests\StoreRouteRequest;
use App\Models\Route;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $routes = Route::latest()->get();
       

        if ($request->expectsJson()) {
            return response()->json([RouteResource::collection($routes), 'Route fetched.']);
        } else {
            return view('routes.index', ['routes' => $routes]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteRequest $request)
    {
        $character_image = Str::random(32).".".$request->path_to_route_image->getClientOriginalExtension();
        $map_image = Str::random(32).".".$request->path_to_map_image->getClientOriginalExtension();
        $route_image = Str::random(32).".".$request->path_to_character_image->getClientOriginalExtension();
   
        Storage::disk('public')->put('/character_image/'.$character_image, file_get_contents($request->path_to_character_image));
        Storage::disk('public')->put('/map_image/'.$map_image, file_get_contents($request->path_to_map_image));
        Storage::disk('public')->put('/route_image/'.$route_image, file_get_contents($request->path_to_character_image));

        $route = Route::create([
            'name' => $request->name,
            'description' => $request->description,
            'path_to_route_image' =>  $route_image,
            'expected_time' => $request->expected_time,
            'path_to_map_image' => $map_image,
            'path_to_character_image' => $character_image,
         ]);

        return response()->json([
            'message' => 'Route successfully created.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($routeId)
    {
            $route = Route::findOrFail($routeId);
            if (is_null($route)) {
                return response()->json('Data not found', 404); 
            }
    
            return response()->json([new RouteResource($route)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRouteRequest $request, $id)
    {
        $route = Route::findOrFail($id);
        $route->name = $request->name;
        $route->description = $request->description;
        $route->expected_time = $request->expected_time;

        if ($request->hasfile('path_to_character_image')) {
            if (Storage::disk('public')->exists('character_image/'.$route->path_to_character_image)) {
                Storage::disk('public')->delete('character_image/'.$route->path_to_character_image);
            }

            $character_image = Str::random(32).".".$request->path_to_character_image->getClientOriginalExtension();
            Storage::disk('public')->put('/character_image/'.$character_image, file_get_contents($request->path_to_character_image));
            $route->path_to_character_image = $character_image;          
        }

        if ($request->hasfile('path_to_route_image')) {
            if (Storage::disk('public')->exists('/route_image/'.$route->path_to_route_image)) {
                Storage::disk('public')->delete('/route_image/'.$route->path_to_route_image);
            }

            $route_image = Str::random(32).".".$request->path_to_route_image->getClientOriginalExtension();
            Storage::disk('public')->put('/route_image/'.$route_image, file_get_contents($request->path_to_route_image));
            $route->path_to_route_image = $route_image;          
        }

        if ($request->hasfile('path_to_character_image')) {
            if (Storage::disk('public')->exists('map_image/'.$route->path_to_map_image)) {
                Storage::disk('public')->delete('map_image/'.$route->path_to_map_image);
            }

            $map_image = Str::random(32).".".$request->path_to_map_image->getClientOriginalExtension();
            Storage::disk('public')->put('/map_image/'.$map_image, file_get_contents($request->path_to_map_image));
            $route->path_to_map_image = $map_image;          
        }
        
        $route->save();
    
        return response()->json(['Route updated successfully.', new RouteResource($route)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($routeId)
    {
        $route = Route::findOrFail($routeId);
        $route->delete();

        return response()->json('Route deleted successfully');
    }
}
