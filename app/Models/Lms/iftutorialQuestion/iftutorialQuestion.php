<?php

namespace App\Models\Lms\iftutorialQuestion;

//use App\Models\Lms\Question\Traits\Relationship\iftutorialQuestionRelationship;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\iftutorialQuestion\Traits\Attribute\iftutorialQuestionAttribute;
use App\Models\Lms\iftutorialQuestion\Traits\Scope\iftutorialQuestionScope;

class iftutorialQuestion extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use iftutorialQuestionScope,
        SoftDeletes,
        iftutorialQuestionAttribute;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'teacher_id', 'tutquestion_type', 'type', 'tutquestion_level', 'question', 'program', 'question_ans',
                        'mc_ans1', 'mc_ans2', 'mc_ans3', 'mc_ans4', 'photo', 'slug', 'status' ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('lms.iftutorialQuestions_table');
    }
}
