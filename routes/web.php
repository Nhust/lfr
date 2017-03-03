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

Route::get('/', 'EventController@index');
//ROUTES POUR LA GESTION DE COMPTE USER
Auth::routes();
Route::get('/home','EventController@index');



//ENSEMBLE DES ROUTES POUR LA GESTION DES EVENEMENTS

Route::get('/events',['as'=>'event.index','uses' => 'EventController@index']);
Route::get('/events/show/{id}',['as'=>'event.show','uses'=>'EventController@show']);
Route::get('/events/show/{id}/roster',['as'=>'event.showRoster','uses'=>'EventController@showRoster','middleware'=>'auth']);
Route::get('/events/show/{id}/inscription',['as'=>'event.inscription','uses'=>'EventController@inscription','middleware'=>'auth']);
Route::get('/events/edit/{id}',['as'=>'event.edit','uses'=>'EventController@edit','middleware'=>'auth']);
Route::post('/events/store',['as'=>'event.store','uses'=>'EventController@store','middleware'=>'auth']);
Route::get('/events/create',['as'=>'event.create','uses'=>'EventController@create','middleware'=>'auth']);
Route::put('/events/update/{id}',['as'=>'event.update','uses'=>'EventController@update','middleware'=>'auth']);
Route::post('/events/characters/store/{id}',['as'=>'eventsCharacters.save','uses'=>'EventController@savesCharacters','middleware'=>'auth']);
Route::get('/events/{id}/destroy',['as'=>'events.destroy','uses'=>'EventController@destroy','middleware'=>'auth']);
Route::post('/events/{id}/confirmer/{confirmer}',['as'=>'event.confirmer','uses'=>'EventController@confirmer','middleware'=>'auth']);
Route::post('/events/{id}/refuser/{refuser}',['as'=>'event.refuser','uses'=>'EventController@refuser','middleware'=>'auth']);


Route::get('/search',['as'=>'search','uses'=>'HomeController@search']);
//ENSEMBLE DES ROUTES POUR LA GESTION DUN PERSONNAGE

Route::get('/characters',['as'=>'characters.index','uses'=>'CharactersController@index','middleware'=>'auth']);
Route::get('/characters/show/{id}',['as'=>'characters.show','uses'=>'CharactersController@show','middleware'=>'auth']);
Route::get('/characters/edit/{id}',['as'=>'characters.edit','uses'=>'CharactersController@edit','middleware'=>'auth']);
Route::put('/characters/update/{id}',['as'=>'characters.update','uses'=>'CharactersController@update','middleware'=>'auth']);
Route::post('/characters/store',['as'=>'characters.store','uses'=>'CharactersController@store','middleware'=>'auth']);
Route::get('/characters/create',['as'=>'characters.create','uses'=>'CharactersController@create','middleware'=>'auth']);
Route::get('/characters/{id}/destroy',['as'=>'characters.destroy','uses'=>'CharactersController@destroy','middleware'=>'auth']);
// ENSEMBLE DES ROUTES POUR LA GESTION DE LA PAGE UTILISATEUR

Route::get('/profile/{id}',['as'=>'profile.index','uses'=>'ProfileController@index','middleware'=>'auth']);
Route::get('/profile/{id}/edit',['as'=>'profile.edit','uses'=>'ProfileController@edit','middleware'=>'auth']);
Route::put('/profile/{id}/update',['as'=>'profile.update','uses'=>'ProfileController@update','middleware'=>'auth']);
Route::get('/profile/{id}/events',['as'=>'profile.showEvents','uses'=>'ProfileController@showEvents','middleware'=>'auth']);
Route::get('/profile/{id}/characters',['as'=>'profile.showCharacters','uses'=>'ProfileController@showCharacters','middleware'=>'auth']);

Route::get('500', function()
{
    abort(500);
});