<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['nickname', 'avatar', 'steamid', 'type', 'contributions'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
