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

Route::get('/', 'HomeController@welcome');
Route::get('/login', 'AuthController@login');
Route::get('/about', 'HomeController@about');
Route::get('/features', 'HomeController@features');
Route::get('/logout', 'AuthController@logout');
Route::get('/map/{map}','NadesController@showNades');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
	Route::get('/admin', 'AdminController@home');

	//Admin Routes for Map Control
	Route::get('/admin/maps', 'AdminController@mapsView');
	Route::get('/admin/maps/addclassic', 'AdminController@addClassicMaps');
	Route::get('/admin/maps/{map}','AdminController@changeMapView');
	Route::get('/admin/maps/{map}/delete', 'AdminController@deleteMap');
	Route::get('/admin/maps/{map}/deactivate','AdminController@deactivateMap');
	Route::get('/admin/maps/{map}/delnades','AdminController@deleteNadesOnMap');

	Route::post('/admin/maps/add', 'AdminController@addMap');
	Route::post('admin/maps/{map}/info', 'AdminController@changeMap');

	//Admin Routes for User Control
	Route::get('/admin/users', 'AdminController@usersView');

	Route::post('/admin/users/ban','AdminController@banUser');
	Route::post('/admin/users/group','AdminController@groupUser');

	//Routes for Nades
	Route::get('/approve','AdminController@approveNadesView');
	Route::get('/approve/{id}','AdminController@editNadesView');
	Route::get('/approve/{id}/delete', 'AdminController@deleteNade');
	Route::get('/approve/{id}/confirm', 'AdminController@approveNade');

	
	Route::post('/approve/{id}/edit', 'AdminController@editNade');


});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@home');
	Route::get('/add', 'NadesController@addNadeView');
	Route::post('/add/perform', 'NadesController@addNade');

});
