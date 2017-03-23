<?php

namespace App\Models\Lms\Game\Traits\Relationship;


/**
 * Class UserRelationship.
 */
trait GameRelationship
{
    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(config('lms.question'), config('lms.game_question_table'), 'game_id', 'question_id');
    }

//    public function modules()
//    {
//        return $this->belongsToMany(config('lms.providers.modules.model'), config('lms.module_game_table'), 'game_id', 'module_id');
//    }

}
