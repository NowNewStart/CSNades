<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nade extends Model
{
    public function map() {
    	return $this->belongsTo('App\Map');
    }

    protected $fillable = ['map_id','user_id','type','pop_spot','title','imgur_album','gfycat','youtube','is_working','tags','approved_by','approved_at'];

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

    public function user() {
        return $this->belongsTo('App\User');
    }
    public static function getNadeIcon($nadeType)
    {
        return self::$nadeTypes[$nadeType]['class'];
    }
    public function approved_by()
    {
        return $this->belongsTo('App\User', 'id','approved_by');
    }    
}
