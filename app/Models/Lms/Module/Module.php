<?php

namespace App\Models\Lms\Module;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Module\Traits\Attribute\ModuleAttribute;
use App\Models\Lms\Module\Traits\Scope\ModuleScope;
use App\Models\Lms\Module\Traits\Relationship\ModuleRelationship;
use App\Models\Lms\Module\Traits\ModuleLesson;
use App\Models\Lms\Module\Traits\ModuleGame;

class Module extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use ModuleScope,
        SoftDeletes,
        ModuleAttribute,
        ModuleRelationship,
       ModuleLesson,
       ModuleGame

     ;

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
        $this->table = config('lms.modules_table');
    }
}
//
//class ModuleB extends Module{
//
//    use ModuleLesson;
//}
