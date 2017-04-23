<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['item_id' ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
