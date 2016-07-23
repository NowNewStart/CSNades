<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Map;
use Session;

class AdminController extends Controller
{
    public function home() {
    	return view('admin.home');
    }

    public function maps_view() {
    	$maps = Map::all();
    	return view('admin.maps')->with(['maps' => $maps]);
    }


    public function users_view() {
    	return view('admin.users');
    }

    public function maps() {

    }

    public function users() {

    }

    public function addMap(Request $request) {
    	$this->validate($request, [
    		'map' => 'required',
    		'url' => 'required'
    	]);	
    	if(Map::where('map',$request->input('map'))->count() != 0) {
    		Session::flash('flash_danger','The map already exists.');
    		return redirect('/admin/maps');
    	}
    	$slug = strtolower(preg_replace('/\s+/', '', $request->input('map')));
    	Map::create([
    		'map' => $request->input('map'),
    		'slug' => $slug,
    		'url' => $request->input('url')
    	]);
    	Session::flash('flash_success', $request->input('map') . " has successfully been added.");
    	return redirect('/admin/maps');
    }
}
