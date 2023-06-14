<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\RouteWaypoint;
use App\Models\Waypoint;
use Illuminate\Http\Request;

class RouteWaypointController extends Controller
{
    public function index(Route $route) {
        $waypoints = Waypoint::latest()->titleSearch(request(['search']))->get();
        $route_waypoints = RouteWaypoint::where('route_id', $route->id)->pluck('waypoint_id','index_of_route')->toArray();
        
        return view('route_waypoints.show', ['waypoints' => $waypoints, 'route' => $route, 'route_waypoints' => $route_waypoints]);
    }

    public function assign(Request $request, Route $route) {

        $indexes = $request->input('waypoint_order');

        $isValid = true;

        foreach($indexes as $index => $value) {
            if (!is_numeric($value) || !ctype_digit($value) || $value < 1) {
                $isValid = false;
                break;
            }
        }

        $sortedIndexes = collect($indexes)->map(function ($value) {
            return (int) $value;
        })->sort()->values()->toArray();

        $keys = array_keys($sortedIndexes);

        for ($i = 0; $i < count($keys) - 1; $i++) {
            $current = $sortedIndexes[$keys[$i]];
            $next = $sortedIndexes[$keys[$i + 1]];

            if ($next - $current > 1) {
            $isValid = false;
            break;
                
            }
        }

        if ($isValid) {

            RouteWaypoint::where('route_id', $route->id)->delete();

            $waypoints = [
                'id' => $request->input('waypoint_id'),
                'index_of_route' => $indexes
            ];
            
            for ($i=0; $i < count($waypoints['id']); $i++) { 
                RouteWaypoint::create(['route_id' => $route->id, 'waypoint_id' => $waypoints['id'][$i], 'index_of_route' => $waypoints['index_of_route'][$i]]);
            }
            
            return redirect('/routes')->with('message', 'Die Waypoints wurden der Route '. $route->name .' erfolgreich zugeordnet');

        } else {

            $danger = true;

            return redirect('/routes/'. $route->id .'/waypoints')->with('message', 'Die Indexierung der Waypoints war nicht korrekt!')->with('danger', $danger);

        }

    }

}
