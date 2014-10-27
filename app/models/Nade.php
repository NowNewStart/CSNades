<?php

class Nade extends Eloquent {

    protected $table = 'nades';

    // public $timestamps = false;

    public function map()
    {
        return $this->belogsTo('Map');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function save(array $options = array()) {
        parent::save($options);

        if (!App::runningInConsole()) {
            # code...
        }
    }
}