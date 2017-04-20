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

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skill()
    {
        return $this->hasOne(Skill::class);
    }

    public function question(){
        return $this->hasMany('App\Question');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item');
    }

}
