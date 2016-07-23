<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Map;
use Session;
use App\User;

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
        $users = User::where('type','U')->orderBy('contributions','desc')->take(5)->get();
    	return view('admin.users.home')->with(['users' => $users]);
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
        if(Map::where('map',$map)->count() == 0) {
            Session::flash('flash_danger','The map does not exist.');
            return redirect('/admin/maps');
        }  
        Map::where('map',$map)->delete();
        Session::flash('flash_success', $map. " has been deleted.");
        return redirect('/admin/maps');      
    }

    public function changeMap($map, Request $request) {
        $this->validate($request, [
            'map' => 'required',
            'url' => 'required'
        ]);     
        if(Map::where('map',$map)->count() == 0) {
            Session::flash('flash_danger','The map does not exist.');
            return redirect('/admin/maps');
        }
        $slug = strtolower(preg_replace('/\s+/', '', $request->input('map')));
        Map::where('map',$map)->update(['map' => $request->input('map'), 'slug' => $slug, 'url' => $request->input('url'), 'active' => 1]);
        Session::flash('flash_success', $request->input('map') . " has successfully been updated.");
        return redirect('/admin/maps/'.$slug);       
    }

    public function deleteNadesOnMap($map) {

    }

    public function deactivateMap($map) {
        if(Map::where('map',$map)->count() == 0) {
            Session::flash('flash_danger','The map does not exist.');
            return redirect('/admin/maps');
        }   
        if(Map::where('map',$map)->first()->active == 1) {
            Map::where('map',$map)->update(['active' => 0]);
            Session::flash('flash_success', $map. " has been deactivated.");     
        } else {
            Map::where('map',$map)->update(['active' => 1]);
            Session::flash('flash_success', $map. " has been activated.");     
        }
        return redirect('/admin/maps/'.$map);
        
    }

    public function banUser(Request $request) {
        $this->validate($request, [
            'steamid' => 'required'
        ]);
        if(User::where('steamid',$request->input('steamid'))->count() == 0) {
            Session::flash('flash_danger', 'This user does not exist.');
            return redirect('/admin/users');
        }
        User::where('steamid',$request->input('steamid'))->update(['type' => 'B']);
        Session::flash('flash_success','User with SteamID ' . $request->input('steamid') . ' has been banned.');
        return redirect('/admin/users');
    }

    public function groupUser(Request $request) {
        $this->validate($request, [
            'steamid' => 'required',
            'group' => 'required'
        ]);
        if(User::where('steamid',$request->input('steamid'))->count() == 0) {
            Session::flash('flash_danger', 'This user does not exist.');
            return redirect('/admin/users');
        }
        if($request->input('group') == "Admin") {
            $group = "A";
        } elseif($request->input('group') == "User") {
            $group = "U";
        } else {
            Session::flash('flash_danger', 'There is a problem with the dropdown. Please retry.');
            return redirect('/admin/users');
        }
        User::where('steamid',$request->input('steamid'))->update(['type' => $group]);
        Session::flash('flash_success', 'Group for ' . $request->input('steamid') . ' has been set.');
        return redirect('/admin/users');      
    }
}
