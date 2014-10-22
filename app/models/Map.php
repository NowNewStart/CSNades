<?php

class Map extends Eloquent {
    protected $table = 'maps';
    public $timestamps = false;

    public function save(array $options = array()) {
        parent::save($options);

        if (!App::runningInConsole()) {
            # code...
        }
    }
}