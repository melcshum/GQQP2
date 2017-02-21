<?php

namespace App\Models\Lms\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Model\Traits\Attribute\ModelAttribute;
use App\Models\Lms\Model\Traits\Scope\ModelScope;

class Modelle extends Model
{
    /*
    use
        UserAccess,
        Notifiable,
        UserRelationship,
        UserSendPasswordReset;

*/
    use ModelScope,
        SoftDeletes,
        ModelAttribute;

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
        $this->table = config('lms.models_table');
    }
}
