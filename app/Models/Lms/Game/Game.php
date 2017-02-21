<?php

namespace App\Models\Lms\Game;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Lms\Game\Traits\Attribute\GameAttribute;
use App\Models\Lms\Game\Traits\Scope\GameScope;

//use Illuminate\Foundation\Auth\User as Authenticatable;
//use App\Models\Access\Game\Traits\UserAccess;
//use App\Models\Access\Game\Traits\UserSendPasswordReset;
//use App\Models\Access\Game\Traits\Relationship\UserRelationship;

/**
 * Class Game.
 */
class Game extends Model
{
    /*
        use
            UserAccess,
            Notifiable,
            UserRelationship,
            UserSendPasswordReset;

    */
    use GameScope,
        SoftDeletes,
        GameAttribute;

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
        $this->table = config('lms.games_table');
    }
}
