<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

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

    protected $rules = array();

    protected $messages = array(
        'password2.required' => 'The password confirmation is required.',
        'password2.same' => 'The password and password confirmation must match.',
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

    public function setAddUserValidation()
    {
        return $this->setRule('username', 'required|alpha_num|between:6,20|unique:users')
                    ->setRule('email', 'required|email|unique:users')
                    ->setRule('password', 'required|min:8')
                    ->setRule('password2', 'required|same:password');
    }
}
