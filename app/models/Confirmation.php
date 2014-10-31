<?php

class Confirmation extends Eloquent {

    protected $table = 'confirmations';

    public $timestamps = false;

    protected $fillable = array('code');

    public function user()
    {
        return $this->belongsTo('User');
    }
}