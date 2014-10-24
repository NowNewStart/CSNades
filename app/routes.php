<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('main')->with('heading', 'Most Recent Nades');
}));

Route::get('env', function(){
    return App::environment();
});

// Maps
Route::get('maps/{slug}', 'MapsController@showMap');
Route::get('maps/add', 'MapsController@showMapForm'); // logged in only
Route::post('maps/add', 'MapsController@saveMap'); // logged in only
Route::get('maps/edit/{id}', 'MapsController@showMapForm'); // staff
Route::post('maps/edit/{id}', 'MapsController@saveMap'); // staff
Route::get('maps', 'MapsController@showAllMaps');

// Nades
Route::get('nades/add', 'NadesController@showNadeForm'); // logged in only
Route::post('nades/add', 'NadesController@saveNade'); // logged in only
Route::get('nades/edit/{id}', 'NadesController@showNadeForm'); // staff only
Route::post('nades/edit/{id}', 'NadesController@saveNade'); // staff only
Route::get('nades/unapproved', 'NadesController@showUnapprovedNades'); // staff only
Route::get('nades', 'NadesController@showSomeNades');

// Users
Route::get('login', 'UsersController@showLoginForm');
Route::post('login', 'UsersController@attemptLogin');
Route::get('logout', 'UsersController@logout');