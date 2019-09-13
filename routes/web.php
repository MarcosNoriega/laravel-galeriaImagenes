<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::group(array('prefix' => 'Albumes'), function(){
        Route::get('/', 'AlbumesController@index')->name('albumes.index');
        Route::post('/store', 'AlbumesController@store')->name('albumes.store');
        Route::get('/show/{id}', 'AlbumesController@show')->name('albumes.show');
        Route::post('/show/{id}', 'AlbumesController@storePhotos')->name('albumes.storePhotos');
        Route::get('/edit/{id}', 'AlbumesController@edit')->name('albumes.edit');
        Route::post('/update/{id}', 'AlbumesController@update')->name('albumes.update');
    });

    Route::group(array('prefix' => 'Fotos'), function(){
        Route::get('/index', 'FotosController@index')->name('foto.index');
        Route::delete('/destroy/{id}', 'FotosController@destroy')->name('foto.destroy');
        Route::get('/show', 'FotosController@show')->name('foto.show');
        Route::get('/edit/{id}', 'FotosController@edit')->name('foto.edit');
        Route::post('/update/{id}', 'FotosController@update')->name('foto.update');
        Route::post('/store', 'FotosController@store')->name('foto.store');
    });

    Route::group(array('prefix' => 'Musica'), function(){
        Route::get('/canciones', 'MusicaController@index')->name('musica.canciones');
    });



    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();


