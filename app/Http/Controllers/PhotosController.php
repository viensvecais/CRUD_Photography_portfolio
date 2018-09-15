<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Photo;
use App\Album;
use App\Http\Resources\PhotosResource;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($album_id)
    {
        $photos = Album::findOrFail($album_id)->photos()->paginate(10);
        return PhotosResource::collection($photos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('photo');
        $filenames = array();
        foreach ($files as $file) {
            //Get filename
            $filenameWithExt = $file->getClientOriginalName();
            //Get filename without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get extension
            $ext = $file->getClientOriginalExtension();
            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            //Upload image
            $path = $file->storeAs('public/images/album'.$request->album_id, $filenameToStore);
            //Create new Photo entry and save
            $entry = new Photo;
            $entry->album_id = $request->album_id;
            $entry->photo = $filenameToStore;
            $entry->size = $file->getClientSize();

            $entry->save();

            array_push($filenames, $filenameToStore);
        }

        $photos = Album::findOrFail($request->album_id)->photos()->paginate(10);
        return PhotosResource::collection($photos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        PhotosResource::withoutWrapping();
        return new PhotosResource($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $filePath = 'public/images/album'.$photo->album_id.'/'.$photo->photo;
        Storage::delete($filePath);


        if($photo->delete()) {
            return new PhotosResource($photo);
        }
    }

    //Manual test for checking variable values
    public function test($id) {

        $photo = Photo::findOrFail($id);
        $filePath = 'public/images/album'.$photo->album_id.'/'.$photo->photo;

        return $filePath;
    }
}
