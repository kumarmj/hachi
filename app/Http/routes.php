<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('/search', 'MainController@search')->middleware('limit');
Route::post('/special', 'MainController@special')->middleware('limit');
Route::get('/profile/{username}', 'MainController@show')->name('profile');

Route::get('/', function () {
    return view('welcome');
})->name('index');
