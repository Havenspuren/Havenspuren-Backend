<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaRequest;

class MediaController extends Controller
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
    public function store(StoreMediaRequest $request)
    {
        $fileName = Str::random(32).".".$request->path_to_file->getClientOriginalExtension();

        Storage::disk('public')->put($fileName, file_get_contents($request->path_to_file));

        $media = Media::create([
            'path_to_file' => $fileName,
            'extra' => $request->extra,
            'type' => $request->type
         ]);

        //return Json Response
        return response()->json([
            'message' => 'Media successfully created.'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMediaRequest $request, $mediaId)
    {
        $media = Media::find($mediaId);
        $media->path_to_file = $request->path_to_file;
        $media->extra = $request->extra;
        $media->type = $request->type;
        $media->save();

        return response()->json('Media updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId)
    {
        $media = Media::find($mediaId);
        $media->delete();

        return response()->json('Media deleted successfully');
    }
}
