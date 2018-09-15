<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Albums
    //List Albums
    Route::get('albums', 'AlbumsController@index');

    //List Single Album
    Route::get('album/{id}', 'AlbumsController@show');

    //Create new Album
    Route::post('album', 'AlbumsController@store');

    //Update Album
    Route::put('album', 'AlbumsController@store');

    //Delete Album
    Route::delete('album/{id}', 'AlbumsController@destroy');

    Route::get('testalbum/{id}', 'AlbumsController@albumdelete');

//Photos
    //List  Photos
    Route::get('photos/{id}', 'PhotosController@index');

    //List Single Photo
    Route::get('photo/{id}', 'PhotosController@show');

    //Create new Photo
    Route::post('photo', 'PhotosController@store');

    //Delete article
    Route::delete('photo/{id}', 'PhotosController@destroy');

    Route::get('test/{id}', 'PhotosController@test');


