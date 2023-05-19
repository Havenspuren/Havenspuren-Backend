<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAudioRequest;

class AudioController extends Controller
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
    public function store(StoreAudioRequest $request)
    {
        $fileName = Str::random(32).".".$request->path_to_file->getClientOriginalExtension();
        
        Storage::disk('public')->put($fileName, file_get_contents($request->path_to_file));

        $audio = Audio::create([
            'path_to_file' => $fileName,
            'extra' => $request->extra,
         ]);

        return response()->json([
            'message' => 'Trophy successfully created.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAudioRequest $request, $audioId)
    {
        $audio = Audio::find($audioId);
        $audio->path_to_file = $request->path_to_file;
        $audio->extra = $request->extra;
        $audio->save();

        return response()->json('Audio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy($audioId)
    {
        $audio = Audio::find($audioId)->delete();
    
        return response()->json('Audio deleted successfully');
    }
}
