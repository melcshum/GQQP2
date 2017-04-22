<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
