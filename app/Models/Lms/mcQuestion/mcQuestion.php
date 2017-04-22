<?php

namespace App\Models\Lms\mcQuestion;

//use App\Models\Lms\Question\Traits\Relationship\mcQuestionRelationship;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\mcQuestion\Traits\Attribute\mcQuestionAttribute;
use App\Models\Lms\mcQuestion\Traits\Scope\mcQuestionScope;

class mcQuestion extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use mcQuestionScope,
        SoftDeletes,
        mcQuestionAttribute;

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
    protected $fillable = ['name', 'teacher_id' ];

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
        $this->table = config('lms.mcQuestions_table');
    }
}
