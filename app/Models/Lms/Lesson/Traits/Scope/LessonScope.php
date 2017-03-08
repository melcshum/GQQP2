<?php

namespace App\Models\Lms\Lesson\Traits\Scope;

/**
 * Class CourseScope.
 */
trait LessonScope
{
    /**
     * @param $query
     * @param bool $confirmed
     *
     * @return mixed
     */
//    public function scopeConfirmed($query, $confirmed = true)
//    {
//        return $query->where('confirmed', $confirmed);
//    }

    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('status', $status);
    }
}
