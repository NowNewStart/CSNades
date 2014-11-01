<?php

class Map extends Eloquent {

    protected $table = 'maps';

    public $timestamps = false;

    public function nades()
    {
        return $this->hasMany('Nade');
    }
}