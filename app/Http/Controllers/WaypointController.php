<?php

namespace App\Http\Controllers;

use App\Models\Waypoint;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWaypointRequest;

class WaypointController extends Controller
{
   
    public function index()
    {
        $waypoints = Waypoint::latest()->search(request(['search']))->paginate(8);
        return view('waypoints.waypoints', ['waypoints' => $waypoints]);
    }
    
    public function create() {
        return view('waypoints.create');
    }

    public function store(Request $request)
    {   
        $fields = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
        ]);

        Waypoint::create($fields);

        return redirect('/waypoints')->with('message', 'Waypoint wurde erfolgreich erstellt!');

       /*
        $waypoint = Waypoint::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'index_of_route' => $request->index_of_route,
            'visited' => $request->visited
         ]);
    
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
        ], 201); */
    }

    public function edit(Waypoint $waypoint) {
        return view('waypoints.edit', ['waypoint' => $waypoint]);
    }

    public function show(Waypoint $waypoint)
    {
        return view('waypoints.show', ['waypoint' => $waypoint]); 
    }

    public function update(Request $request, Waypoint $waypoint)
    {
        /*
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
        */

        $fields = $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
        ]);

        $waypoint->update($fields);

        return redirect('/waypoints')->with('message', $waypoint->name .' wurde erfolgreich bearbeitet');

    }

    public function destroy(Waypoint $waypoint)
    {   /*
        $waypoint = Waypoint::find($routeId);
        $waypoint->delete();

        return response()->json('Waypoint deleted successfully'); */

        $waypoint->delete();
        return redirect('/waypoints')->with('message', 'Waypoint wurde erfolgreich gelöscht!');
    }
}