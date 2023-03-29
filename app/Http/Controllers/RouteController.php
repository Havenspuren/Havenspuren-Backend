<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RouteResource;
use App\Http\Requests\StoreRouteRequest;
use App\Models\Route;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //return new SimpleRoutes(Route::all());
        //return $routes = Route::all();

        $routes = Route::latest()->get();
        return response()->json([RouteResource::collection($routes), 'Route fetched.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRouteRequest $request)
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

        //save Image in Storag folder
        Storage::disk('public')->put($imageName, file_get_contents($request->path_to_character_image));


        $route = Route::create([
            'name' => $request->name,
            'description' => $request->description,
            'path_to_route_image' => $request->path_to_route_image,
            'expected_time' => $request->expected_time,
            'path_to_map_image' => $request->path_to_map_image,
            // we store only the image name in DB
            'path_to_character_image' => $imageName,
         ]);

         //$route->waypoints()->attach(['1', '2']);
         
        //return new SimpleRoute($route);

        //return Json Response
        return response()->json([
            'message' => 'Route successfully created.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($routeId)
    {
            //return response()->json($routeId);
        
            $route = Route::find($routeId);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($routeId)
    {
        $route = Route::find($routeId);
        $route->delete();

        return response()->json('Route deleted successfully');
    }
}
