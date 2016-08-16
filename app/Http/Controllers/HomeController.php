<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Map;
use Carbon\Carbon;
use App\Http\Requests;

class HomeController extends Controller
{
    public function home() {
    	return "works";
    }

    public function welcome() {
    	$maps = Map::all();
    	$date = Carbon::create(0);
    	return view('welcome')->with(['maps' => $maps, 'date' => $date]);	
    }
}
