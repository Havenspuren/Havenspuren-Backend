<?php

namespace App\Http\Controllers;

use App\Models\Waypoint;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWaypointRequest;

class WaypointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWaypointRequest $request)
    {
       /*
        $waypoint = Waypoint::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'index_of_route' => $request->index_of_route,
            'visited' => $request->visited
         ]);*/
    
         $route = Route::findOrFail($request->routeId);
    
         //$waypoint->routes()->attach($route);
       
         $route->waypoints()->create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'index_of_route' => $request->index_of_route,
            'visited' =>$request->visited,
         ]);
       
        return response()->json([
            'message' => 'Waypoint successfully created.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waypoint  $waypoint
     * @return \Illuminate\Http\Response
     */
    public function show(Waypoint $waypoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waypoint  $waypoint
     * @return \Illuminate\Http\Response
     */
    public function update(StoreWaypointRequest $request, $waypointId)
    {

        $waypoint = Waypoint::find($waypointId);
        $waypoint->title = $request->title;
        $waypoint->short_description = $request->short_description;
        $waypoint->long_description = $request->long_description;
        $waypoint->latitude = $request->latitude;
        $waypoint->longitude = $request->longitude;
        $waypoint->index_of_route = $request->index_of_route;
        $waypoint->visited = $request->visited;
        $waypoint->save();

        return response()->json('Waypoints updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waypoint  $waypoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($routeId)
    {
        $waypoint = Waypoint::find($routeId);
        $waypoint->delete();

        return response()->json('Waypoint deleted successfully');
    }
}