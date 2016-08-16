<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use App\Nade;
use Session;
use Carbon\Carbon;
use App\Http\Requests;
use Auth;
use App\User;

class NadesController extends Controller
{
    public function addNadeView() {
    	$maps = Map::pluck('map','slug');
    	return view('nades.add')->with(['maps' => $maps]);
    }

    public function addNade(Request $request) {
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
        $nade = new Nade();
    	$map = Map::where('slug',$request->input('slug'))->first();
    	$nade->map()->associate($map);
    	$nade->user()->associate($user);
        $nade->map_id = $map->id;
    	$nade->type = $request->input('type');
    	$nade->pop_spot = $request->input('pop');
    	$nade->title = $request->input('title');
        if(empty($yt) && empty($gfy) && !empty($imgur)) {
            $nade->imgur_album = $imgur;
            $nade->gfycat = "";
            $nade->youtube = "";
        } elseif(!empty($yt) && empty($gfy) && empty($imgur)) {
            $nade->youtube = $yt;
            $nade->gfycat = "";
            $nade->imgur_album = "";
        } elseif(empty($yt) && !empty($gfy) && empty($imgur)) {
            $nade->gfycat = $gfy;
            $nade->imgur_album = "";
            $nade->youtube = "";
        } elseif(empty($yt) && empty($gfy) && empty($imgur)) {
            Session::flash('flash_danger', 'You need to add a source to your nade.');
            return redirect('/add');            
        } else {
            Session::flash('flash_danger', 'Conflicting sources from the nades. The source has to be one of the 3 possible Requests, not multiple.');
            return redirect('/add');
        }
    	$nade->is_working = $request->input('is_working');
    	$nade->tags = $request->input('tags');
    	if($user->type == "H" OR $user->type == "A") {
    		if($request->input('is_approved') == 1) {
    			$nade->approved_by()->associate($user);
    			$nade->approved_at = Carbon::now();
    	   }
        } else {
    			$nade->approved_by()->dissociate();
    			$nade->approved_at = Carbon::create(0);
    	}
    	$nade->save();
    	Session::flash('flash_success', 'The nade was successfully submitted.');
    	return redirect('/add');

    }

    public function showNades($map) {
    	if(Map::where('slug',$map)->count() == 0) {
    		Session::flash('flash_danger', 'This map does not exist.');
    		return redirect('/');
    	}
    	$nades = Map::where('slug',$map)->first()->nades()->where('approved_at',"IS NOT",Carbon::create(0))->get();
    	return view('nades.show')->with(['nades' => $nades]);
    }
}
