<?php

namespace App\Models\Lms\Lesson;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Lesson\Traits\Attribute\LessonAttribute;
use App\Models\Lms\Lesson\Traits\Scope\LessonScope;
use App\Models\Lms\Lesson\Traits\Relationship\LessonRelationship;

 //use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Models\Access\Lesson\Traits\UserAccess;
//use App\Models\Access\Lesson\Traits\UserSendPasswordReset;
//use App\Models\Access\Lesson\Traits\Relationship\UserRelationship;

/**
 * Class Lesson.
 */
class Lesson extends Model
{
/*    
    use 
        UserAccess,
        Notifiable, 
        UserRelationship,
        UserSendPasswordReset;
        
*/
    use LessonScope,
        SoftDeletes,
        LessonAttribute,
        LessonRelationship;

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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  //  protected $hidden = ['password', 'remember_token'];

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
        $this->table = config('lms.lessons_table');
    }

//    public function lessonable()
//    {
//        return $this->morphTo();
//    }
}
