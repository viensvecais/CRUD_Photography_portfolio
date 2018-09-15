<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Album;
use App\Http\Resources\AlbumsResource;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('photos')->get();
        return AlbumsResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album = $request->isMethod('put') ? Album::findOrFail($request->album_id) : new Album;
        $album->id = $request->input('album_id');
        $album->name = $request->input('name');
        $album->description = $request->input('description');

        if($album->save()) {
            // Make album directory, return new albumresource.
            Storage::makeDirectory('public/images/album'.$album->id, 0755, true);
            return new AlbumsResource($album);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('photos')->findOrFail($id);
        return new AlbumsResource($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $albumImages = $album->photos;
        $imageNames = array();
        foreach ($albumImages as $albumImage) {
            array_push($imageNames, 'public/images/'.$albumImage->photo);
        }
        Storage::delete($imageNames);
        Storage::deleteDirectory('public/images/album'.$id);

        if($album->delete()) {
            return new AlbumsResource($album);
        }
    }
    //Manual test for returning an array of all album image names
    public function albumdelete($id) {
        $album = Album::findOrFail($id);
        $albumImages = $album->photos;
        $imageNames = array();
        foreach ($albumImages as $albumImage) {
            array_push($imageNames, 'public/images/'.$albumImage->photo);
        }
        return $imageNames;


    }
}
