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

    public function mapsView() {
    	$maps = Map::all();
    	return view('admin.maps.home')->with(['maps' => $maps]);
    }


    public function usersView() {
    	return view('admin.users.home');
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

    public function changeMapView($map) {
        if(Map::where('slug',$map)->count() == 0) {
            Session::flash('flash_danger', 'The map ' . $map . ' does not exist.');
            return redirect('/admin/maps');
        }
        $mapdata = Map::where('slug',$map)->first();
        return view('admin.maps.change')->with(['map' => $mapdata]);
    }

    public function deleteMap($map) {
        //TODO: When Nades are coded: INCLUDE DELETION OF NADES ON SPECIFIC MAP HERE TOO
        if(Map::where('map',$map)->count() != 0) {
            Session::flash('flash_danger','The map already exists.');
            return redirect('/admin/maps');
        }        
    }

    public function changeMap($map, Request $request) {

    }

    public function deleteNadesOnMap($map) {

    }

    public function deactivateMap($map) {

    }
}
