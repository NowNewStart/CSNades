<?php

class Nade extends Eloquent {

    protected $table = 'nades';

    protected $fillable = array(
        'type', 'pop_spot', 'title', 'imgur_album', 'youtube', 'is_working',
        'is_approved', 'tags',
    );

    protected static $nadeTypes = array(
        'flash' => array(
            'label' => 'Flashbang',
            'class' => 'fa fa-eye-slash',
        ),
        'frag'  => array(
            'label' => 'High Explosive Grenade',
            'class' => 'fa fa-bomb',
        ),
        'fire'  => array(
            'label' => 'Incendiary / Molotov',
            'class' => 'glyphicon glyphicon-fire'
        ),
        'smoke' => array(
            'label' => 'Smoke Grenade',
            'class' => 'fa fa-soundcloud',
        ),
    );

    protected static $popSpots = array(
        'a-site' => 'A Site',
        'b-site' => 'B Site',
        'mid'    => 'Middle',
        'other'  => 'Other',
    );

    public static function getNadeTypes()
    {
        return self::$nadeTypes;
    }

    public function getNadeTypeKeys()
    {
        return array_keys(self::$nadeTypes);
    }

    public static function getNadeTypeLabel($nadeType)
    {
        return self::$nadeTypes[$nadeType]['label'];
    }

    public static function getNadeIcon($nadeType)
    {
        return self::$nadeTypes[$nadeType]['class'];
    }

    public static function getPopSpots()
    {
        return self::$popSpots;
    }

    public function approved_by()
    {
        return $this->belongsTo('User', 'approved_by');
    }

    public function map()
    {
        return $this->belongsTo('Map');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}