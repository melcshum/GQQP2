<?php

namespace App\Models\Lms\Question\Traits\Relationship;

/**
 * Class RoleRelationship.
 */
trait QuestionRelationship
{
    /**
     * @return mixed
     */
    public function games()
    {
        return $this->belongsToMany(config('lms.providers.games.model'), config('lms.game_question_table'), 'question_id', 'game_id');
    }

}
