<?php

namespace App\Models\Lms\Module\Traits\Relationship;

/**
 * Class RoleRelationship.
 */
trait ModuleRelationship
{
    /**
     * @return mixed
     */
    public function courses()
    {
        return $this->belongsToMany(config('lms.providers.courses.model'), config('lms.course_question_table'), 'module_id', 'course_id');
    }

//    public function lessons()
//    {
//        return $this->belongsToMany(config('lms.lesson'), config('lms.module_lesson_table'), 'module_id', 'lesson_id');
//    }
//
//    public function games()
//    {
//        return $this->belongsToMany(config('lms.game'), config('lms.module_game_table'), 'module_id', 'game_id');
//    }

      public function lessons()
      {
          return $this->morphMany('config(lms.lesson)', 'lessonable');
      }

     public function games()
     {
        return $this->morphMany('config(lms.game)', 'gameable');
     }

}
