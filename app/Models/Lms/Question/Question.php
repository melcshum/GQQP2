<?php

namespace App\Models\Lms\Question;

use App\Models\Lms\Question\Traits\Relationship\QuestionRelationship;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Question\Traits\Attribute\QuestionAttribute;
use App\Models\Lms\Question\Traits\Scope\QuestionScope;

class Question extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use QuestionScope,
        SoftDeletes,
        QuestionAttribute,
        QuestionRelationship;

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
    protected $fillable = ['name', 'description', 'level', 'type', 'slug', 'status' ];

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
        $this->table = config('lms.questions_table');
    }
}
