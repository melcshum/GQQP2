<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'if_else_point', 'loop_point', 'class_point', 'array_point',
        'if_else_level', 'loop_level', 'class_level', 'array_level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
