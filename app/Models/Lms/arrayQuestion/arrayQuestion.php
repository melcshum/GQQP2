<?php

namespace App\Models\Lms\arrayQuestion;

//use App\Models\Lms\Question\Traits\Relationship\arrayQuestionRelationship;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\arrayQuestion\Traits\Attribute\arrayQuestionAttribute;
use App\Models\Lms\arrayQuestion\Traits\Scope\arrayQuestionScope;

class arrayQuestion extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use arrayQuestionScope,
        SoftDeletes,
        arrayQuestionAttribute;

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
    protected $fillable = ['name', 'teacher_id', 'question_type', 'type', 'tutquestion_level', 'tutquestion', 'program', 'question_ans',
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
        $this->table = config('lms.arrayQuestions_table');
    }
}
