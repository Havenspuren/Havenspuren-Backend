<?php

namespace App\Http\Controllers;

use App\Models\Trophy;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrophyRequest;

class TrophyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrophyRequest $request)
    {

        $imageName = Str::random(32).".".$request->path_to_image->getClientOriginalExtension();
        print_r($imageName);

        Storage::disk('public')->put($imageName, file_get_contents($request->path_to_image));

        $trophy = Trophy::create([
            'waypoint_id' => $request->waypoint_id,
            'x' => $request->x,
            'y' => $request->y,
            'name' => $request->name,
            'description' => $request->description,
            'path_to_image' => $imageName,
         ]);

        return response()->json([
            'message' => 'Trophy successfully created.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function show(Trophy $trophy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTrophyRequest $request, $trophyId)
    {
        $trophy = Trophy::find($trophyId);
        $trophy->waypoint_id = $request->waypoint_id;
        $trophy->x = $request->x;
        $trophy->y = $request->y;
        $trophy->name = $request->name;
        $trophy->description = $request->description;
        $trophy->path_to_image = $request->path_to_image;
        $trophy->save();

        return response()->json('Trophy updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trophy  $trophy
     * @return \Illuminate\Http\Response
     */
    public function destroy($trophyId)
    {
        $trophy = Trophy::find($trophyId)->delete();
    
        return response()->json('Trophy deleted successfully');
    }
}
