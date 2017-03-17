<?php

namespace App\Models\Lms\Course\Traits\Relationship;


/**
 * Class UserRelationship.
 */
trait CourseRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(config('lms.module'), config('lms.course_question_table'), 'course_id', 'module_id');
    }
}
