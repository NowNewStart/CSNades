<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Map;
use Session;
use App\Nade;
use Carbon\Carbon;
use Auth;
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
    		'map' => 'required'
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
        if(Map::where('map',$map)->count() == 0) {
            Session::flash('flash_danger','The map does not exist.');
            return redirect('/admin/maps');
        }  
        Map::where('slug',$map)->first()->nades()->delete();
        Map::where('slug',$map)->delete();
        Session::flash('flash_success', $map. " has been deleted.");
        return redirect('/admin/maps');      
    }

    public function changeMap($map, Request $request) {
        $this->validate($request, [
            'map' => 'required'
        ]);     
        if(Map::where('slug',$map)->count() == 0) {
            Session::flash('flash_danger','The map does not exist.');
            return redirect('/admin/maps');
        }
        $slug = strtolower(preg_replace('/\s+/', '', $request->input('map')));
        Map::where('map',$map)->update(['map' => $request->input('map'), 'slug' => $slug, 'url' => $request->input('url'), 'active' => 1]);
        Session::flash('flash_success', $request->input('map') . " has successfully been updated.");
        return redirect('/admin/maps/'.$slug);       
    }

    public function deleteNadesOnMap($map) {
        if(Map::where('slug',$map)->count() == 0) {
            Session::flash('flash_danger', 'The map does not exist.');
            return redirect('/admin/maps');
        }
        Map::where('slug',$map)->first()->nades()->delete();
        Session::flash('flash_success', 'All Nades on that map have been deleted.');
        return redirect('/admin/maps/'.$map);
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

    public function addClassicMaps() {

        Map::firstOrCreate(['map' => 'Cache', 'slug' => 'cache', 'url' => 'http://i.imgur.com/Im0kNDY.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Cobblestone', 'slug' => 'cobblestone', 'url' => 'http://i.imgur.com/jGOhgDq.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Dust 2', 'slug' => 'dust2', 'url' => 'http://i.imgur.com/LZLDJK5.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Mirage', 'slug' => 'mirage', 'url' => 'http://i.imgur.com/0VrFWc1.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Train', 'slug' => 'train', 'url' => 'http://i.imgur.com/NKVwxI4.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Nuke', 'slug' => 'nuke', 'url' => 'http://i.imgur.com/IX4u0tK.png', 'active' => 1]);
        Map::firstOrCreate(['map' => 'Overpass', 'slug' => 'overpass', 'url' => 'http://i.imgur.com/nZBVBLR.png', 'active' => 1]);
        Session::flash('flash_success','All Maps added.');
        return redirect('/admin');
    }

    public function approveNadesView() {
        $nades = Nade::where('approved_by',null)->orderBy('id','asc')->get();
        return view('admin.nades.approve')->with(['nades' => $nades]);
    }

    public function editNadesView($id) {
        $data = Nade::find($id);
        $maps = Map::pluck('map','slug');
        return view('admin.nades.edit')->with(['data' => $data, 'maps' => $maps]);
    }

    public function deleteNade($id) {
        if(Nade::where('id',$id)->count() == 0) {
            Session::flash('flash_danger','The nade does not exist.');
            return redirect('/approve/'.$id);
        }
        Nade::where('id',$id)->delete();
        Session::flash('flash_success', 'The nade was deleted.');
        return redirect('/approve');
    }

    public function approveNade($id) {
        if(Nade::where('id',$id)->count() == 0) {
            Session::flash('flash_danger','The nade does not exist.');
            return redirect('/approve/'.$id);
        }
        $nade = Nade::find($id);
        $nade->approved_by()->associate(Auth::user());
        $nade->update(['approved_at' => Carbon::now() ]);
        Session::flash('flash_success', 'The nade was approved.');
        return redirect('/approve/'.$id);
    }

    public function editNade($id, Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'pop'   => 'required',
            'is_working' => 'required',
            'type' => 'required',
            'map' => 'required',
        ]);
        $user = Auth::user();
        $yt = $request->input('yt');
        $gfy = $request->input('gfy');
        $imgur = $request->input('imgur');
        $nade = Nade::find($id);
        $map = Map::where('slug',$request->input('slug'))->first();
        if(empty($yt) && empty($gfy) && !empty($imgur)) {
            $gfy = "";
            $yt = "";
        } elseif(!empty($yt) && empty($gfy) && empty($imgur)) {
            $gfy = "";
            $imgur = "";
        } elseif(empty($yt) && !empty($gfy) && empty($imgur)) {
            $imgur = "";
            $yt = "";
        } elseif(empty($yt) && empty($gfy) && empty($imgur)) {
            Session::flash('flash_danger', 'You need to add a source to your nade.');
            return redirect('/add');            
        } else {
            Session::flash('flash_danger', 'Conflicting sources from the nades. The source has to be one of the 3 possible $requests, not multiple.');
            return redirect('/add');
        }
        $nade->update(['map_id' => $map->id, 'type' => $request->input('type'), 'pop_spot' => $request->input('pop'), 'title' => $request->input('title'), 'imgur_album' => $imgur, 'gfycat' => $gfy, 'youtube' => $yt, 'is_working' => $request->input('is_working'), 'tags' => $request->input('tags')]);
        $nade->approved_by()->associate($user);
        $nade->save();
        $nade->update(['approved_at' => Carbon::now() ]);
        Session::flash('flash_success', 'The nade was successfully edited.');
        return redirect('/approve/'.$id);

    }
}
