<?php

namespace App\Models\Lms\Course;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Course\Traits\Attribute\CourseAttribute;

//use App\Models\Access\Course\Traits\Scope\UserScope;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Models\Access\Course\Traits\UserAccess;
//use App\Models\Access\Course\Traits\UserSendPasswordReset;
//use App\Models\Access\Course\Traits\Relationship\UserRelationship;

/**
 * Class Course.
 */
class Course extends Model
{
/*    
    use UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserSendPasswordReset;
        
*/
    use SoftDeletes,
        CourseAttribute;

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
    protected $fillable = ['name', 'description', 'level', 'type', 'slug',  ];

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
        $this->table = config('lms.courses_table');
    }
}
