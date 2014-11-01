<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $dates = array('confirmed_at');

    protected $fillable = array(
        'username', 'password', 'email', 'is_mod', 'is_admin', 'active',
    );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function confirm($code)
    {
        //
    }

    public function confirmation()
    {
        return $this->hasOne('Confirmation');
    }

    public function nades()
    {
        return $this->hasMany('Nade');
    }
}
