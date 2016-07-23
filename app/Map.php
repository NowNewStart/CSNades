<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['map','slug'];


    public function nades() {
    	return $this->hasMany('App\Nade');
    }
}
