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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
	Route::get('/admin', 'AdminController@home');
	Route::get('/admin/maps', 'AdminController@maps_view');
	Route::get('/admin/users', 'AdminController@users_view');

	Route::post('admin/users/change', 'AdminController@users');
	Route::post('/admin/maps/add', 'AdminController@addMap');

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@home');
});