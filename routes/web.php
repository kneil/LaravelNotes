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
    return redirect('/notes');
});

Route::get('/notes', 'NoteController@index');
Route::get('/search/{searchString}', 'NoteController@search');
Route::get('/search', 'NoteController@index');
Route::post('/note', 'NoteController@store');
Route::delete('/note/{id}', 'NoteController@destroy');
Route::get('/note/{id}', 'NoteController@show');
Route::put('/note/{id}', 'NoteController@update');


Auth::routes();

Route::get('/home', 'NoteController@index')->name('home');
