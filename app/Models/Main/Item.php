<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
