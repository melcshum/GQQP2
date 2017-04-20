<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;

class Justfortest extends Model
{
    protected $table = 'items';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
