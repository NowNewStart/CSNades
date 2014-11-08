<?php

use \Carbon\Carbon;

class Nade extends BaseModel {

    protected $dates = array('approved_at');
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

    protected $messages = array(
        'pop_spots' => 'You must select a valid option from the list',
        'messages'  => 'You must select a valid option from the list',
    );

    public function __construct()
    {
        parent::__construct();

        $this->setNadeValidation();
    }

    public function approve(User $user)
    {
        if (!$this->isApproved()) {
            $this->approved_by()->associate($user);
            $this->approved_at = $this->freshTimestamp();
        }

        return $this;
    }

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

    public static function getPopSpotKeys()
    {
        return array_keys(self::$popSpots);
    }

    public function isApproved()
    {
        $emptyDate = new Carbon('0000-00-00 00:00:00');

        if (!$this->approved_at || $emptyDate->gte($this->approved_at)) {
            return false;
        }

        return true;
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

    public function setNadeValidation()
    {
        $this->setRule('title', 'required')
             ->setRule('pop_spot', 'required|in:' . implode(',', $this->getPopSpotKeys()))
             ->setRule('imgur_album', 'url|required_without:youtube')
             ->setRule('youtube', 'url')
             ->setRule('is_working', 'boolean')
             ->setRule('is_approved', 'boolean')
             ->setRule('maps', 'exists:maps')
             ->setRule('type', 'required|in:' . implode(',', $this->getNadeTypeKeys()));
    }

    public function unapprove()
    {
        $this->approved_by()->dissociate();
        $this->approved_at = Carbon::create(0);

        return $this;
    }
}