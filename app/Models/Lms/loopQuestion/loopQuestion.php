<?php

namespace App\Models\Lms\loopQuestion;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\loopQuestion\Traits\Attribute\loopQuestionAttribute;
use App\Models\Lms\loopQuestion\Traits\Scope\loopQuestionScope;

class loopQuestion extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use loopQuestionScope,
        SoftDeletes,
        loopQuestionAttribute;

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
    protected $fillable = ['name', 'teacher_id', 'question_type', 'question_level', 'question', 'program', 'question_ans',
                        'mc_ans1', 'mc_ans2', 'mc_ans3', 'mc_ans4', 'hint', 'photo', 'slug', 'status' ];

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
        $this->table = config('lms.loopQuestions_table');
    }
}
