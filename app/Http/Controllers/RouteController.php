<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Route;
use Illuminate\Support\Str;
use App\Custom\ImageHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Resources\RouteResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRouteRequest;


class RouteController extends Controller
{

    public function index()
    {  
        $routes = Route::latest()->search(request(['search']))->paginate(8);;
        /*
        if ($request->expectsJson()) {
            return response()->json([RouteResource::collection($routes), 'Route fetched.']);
        } else {
            return view('routes.routes', ['routes' => $routes]);
        }
        */
        return view('routes.routes', ['routes' => $routes]);
    }
    
    public function create() {
        return view('routes.create');
    }

   
    public function store(Request $request)
    {   
        $imageHandler = new ImageHandler();

        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'expected_time' => ['required', 'numeric'],
            'path_to_route_image' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
            
        ]);
        
        $fields = $imageHandler->execute($request->path_to_route_image, 'storage/route_image', $fields, 'path_to_route_image');
        $fields = $imageHandler->execute($request->path_to_map_image, 'storage/map_image', $fields, 'path_to_map_image');
        $fields = $imageHandler->execute($request->path_to_character_image, 'storage/character_image', $fields, 'path_to_character_image');
        
        Route::create($fields);

         /*
        return response()->json([
            'message' => 'Route successfully created.'
        ], 201); */
        
        return redirect('/routes')->with('message', 'Route wurde erfolgreich erstellt!');
    }

    
    public function show(Route $route)
    {
        /*

            $route = Route::findOrFail($routeId);

            if ($request->expectsJson()) {
                if (is_null($route)) {
                    return response()->json('Data not found', 404); 
                }else{
                    return response()->json([new RouteResource($route)]);
                }
            } else {
                return view('routes.show', ['route' => $route]); 
            }      

            */

            return view('routes.show', ['route' => $route]); 
    }

   
    public function edit(Route $route)
    {
       
       return view('routes.edit', ['route' => $route]);
    }

    
    public function update(Request $request, Route $route)
    {   

        $imageHandler = new ImageHandler();

        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'expected_time' => ['required', 'numeric'],
        ]);

        if ($request->hasfile('path_to_route_image')) {
            $fields = $imageHandler->execute($request->path_to_route_image, 'storage/route_image', $fields, 'path_to_route_image');
        }

        if ($request->hasfile('path_to_map_image')) {
            $fields = $imageHandler->execute($request->path_to_map_image, 'storage/map_image', $fields, 'path_to_map_image');
        }

        if ($request->hasfile('path_to_character_image')) {
            $fields = $imageHandler->execute($request->path_to_character_image, 'storage/character_image', $fields, 'path_to_character_image');
        }

        $route->update($fields);

        return redirect('/routes')->with('message', $route->name .' wurde erfolgreich bearbeitet');

        /*
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
        */
    }



    public function destroy(Route $route)
    {   

        $route->delete();
        return redirect('/routes')->with('message', 'Route wurde erfolgreich gelöscht!');

        /*
        $route = Route::findOrFail($routeId);
        $route->delete();
        
        if ($request->expectsJson()) {
            return response()->json('Route deleted successfully');
        } else {
            return redirect()->route('routes.index');
        } */
    }



}
