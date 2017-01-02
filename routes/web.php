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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/events', 'EventController@index');
Route::get('/events/show/{id}',['as'=>'event.show','uses'=>'EventController@show']);
Route::post('/events/store',['as'=>'event.store','uses'=>'EventController@store']);
Route::get('/events/create',['as'=>'event.index','uses'=>'EventController@create']);
Route::put('/events/update/{id}',['as'=>'event.update','uses'=>'EventController@update']);