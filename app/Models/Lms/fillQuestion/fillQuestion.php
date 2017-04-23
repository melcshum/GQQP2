<?php

namespace App\Models\Lms\fillQuestion;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\fillQuestion\Traits\Attribute\fillQuestionAttribute;
use App\Models\Lms\fillQuestion\Traits\Scope\fillQuestionScope;

class fillQuestion extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use fillQuestionScope,
        SoftDeletes,
        fillQuestionAttribute;

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
    protected $fillable = ['name', 'teacher_id', 'question_type', 'type', 'question_level', 'question', 'program', 'question_ans',
                        'ans1', 'ans2', 'ans3', 'ans4', 'ans5', 'knowledge', 'gold', 'time', 'hint', 'photo', 'slug', 'status' ];

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
        $this->table = config('lms.fillQuestions_table');
    }
}
