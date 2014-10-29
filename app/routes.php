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

// Route Models
Route::model('mapId', 'Map');
Route::model('nadeId', 'Nade');
Route::bind('map', function($value, $route) {
    return Map::where('slug', $value)->first();
});

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

Route::get('env', function(){
    return App::environment();
});

// Maps
// Route::model('mapSlug', 'Map');

Route::get('maps/{map}/{pop}', 'NadesController@showNadesInMapAtSpot');
Route::get('maps/{map}', 'NadesController@showNadesInMap');
Route::get('maps', 'MapsController@showAllMaps');

// Nades
Route::get('nades', 'NadesController@showSomeNades');

// Users
Route::get('login', 'UsersController@showLoginForm');
Route::post('login', 'UsersController@attemptLogin');
Route::get('logout', 'UsersController@logout');

// Users must be logged in to access these routes
Route::group(array('before' => 'auth'), function() {
    // Nades
    Route::get('nades/add', 'NadesController@showNadeForm');
    Route::post('nades/add', array('before' => 'csrf', 'uses' => 'NadesController@saveNade'));
    
    // Users
    Route::get('profile', 'UsersController@showProfile');




    // Users must be admin to access these routes
    Route::group(array('before' => 'auth.admin'), function() {
        // Maps
        Route::get('maps/add', 'MapsController@showMapForm');
        Route::post('maps/add', 'MapsController@saveMap');
        Route::get('maps/edit/{mapId}', 'MapsController@showMapForm');
        Route::post('maps/edit/{mapId}', 'MapsController@saveMap');
    });

    // Users must be staff to access these routes
    Route::group(array('before' => 'auth.staff'), function() {
        // Nades
        Route::get('nades/edit/{nadeId}', 'NadesController@showNadeForm');
        Route::post('nades/edit/{nadeId}', 'NadesController@saveNade');
        Route::get('nades/unapproved', 'NadesController@showUnapprovedNades');
    });
});