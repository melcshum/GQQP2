<?php

namespace App\Repositories\Lms\Game;

use App\Models\Lms\Game\Game;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use App\Events\Lms\Game\GameCreated;


use App\Events\Lms\Game\GameDeleted;
use App\Events\Lms\Game\GameUpdated;
use App\Events\Lms\Game\GameRestored;
use App\Events\Lms\Game\GamePermanentlyDeleted;
use App\Events\Lms\Game\GameDeactivated;
use App\Events\Lms\Game\GameReactivated;

/*
use App\Notifications\Frontend\Auth\GameNeedsConfirmation;
*/

/**
 * Class GameRepository.
 */
class GameRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Game::class;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()

            ->select([
                config('lms.games_table').'.id',
                config('lms.games_table').'.name',
                config('lms.games_table').'.description',
     //           config('lms.games_table').'.level',
     //           config('lms.games_table').'.type',
      //          config('lms.games_table').'.slug',
                config('lms.status').'.status',
                config('lms.games_table').'.created_at',
                config('lms.games_table').'.updated_at',
                config('lms.games_table').'.deleted_at',
            ]);

        // soft deleted
        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the GameScope trait
        return $dataTableQuery->active($status);
         
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $game = $this->createGameStub($data);

        DB::transaction(function () use ($game, $data) {
            if (parent::save($game)) {

                //User Created, Validate Roles
           //     if (! count($roles['assignees_roles'])) {
          //          throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
          //    }

                //Attach new roles
          //      $user->attachRoles($roles['assignees_roles']);

                //Send confirmation email if requested
          //    if (isset($data['confirmation_email']) && $user->confirmed == 0) {
          //          $user->notify(new UserNeedsConfirmation($user->confirmation_code));
          //      }

                event(new GameCreated($game));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.game.create_error'));
        });
    }

    /**
     * @param Model $game
     * @param array $input
     */
    public function update(Model $game, array $input)
    {
        $data = $input['data']; 
        $game->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($game, $data ) {
            if ( parent::update($game, $data)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
         //     parent::save($game);
              //  $user->confirmed = isset($data['confirmed']) ? 1 : 0;
           
 
             //   $this->checkUserRolesCount($roles);
             //   $this->flushRoles($roles, $user);

               event(new GameUpdated($game));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $game
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $game)
    {
 
        if (parent::delete($game)) {
            event(new GameDeleted($game));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.games.delete_error'));
    }

    /**
     * @param Model $game
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $game)
    {
        if (is_null($game->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.games.delete_first'));
        }

        DB::transaction(function () use ($game) {
            if (parent::forceDelete($game)) {
                event(new GamePermanentlyDeleted($game));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.games.delete_error'));
        });
    }

    /**
     * @param Model $game
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $game)
    {
        if (is_null($game->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.games.cant_restore'));
        }

        if (parent::restore(($game))) {
            event(new GameRestored($game));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.games.restore_error'));
    }

    /**
     * @param Model $game
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $game, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $game->status = $status;

        switch ($status) {
            case 0:
                event(new GameDeactivated($game));
            break;

            case 1:
                event(new GameReactivated($game));
            break;
        }

        if (parent::save($game)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.games.mark_error'));
    }

     

    /**
     * @param $roles
     * @param $user
     */
    protected function flushQuestions($questions, $game)
    {
        //Flush roles out, then add array of new ones
        $game->detachQuestions($game->questions);
        $game->attachQuestions($questions['assignees_questions']);
    }

    


    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createGameStub($input)
    {
        $game = self::MODEL;
        $game = new $game();
        $game->name = $input['name'];
        $game->description =  $input['description'];
        $game->slug =  $input['slug'];
        $game->status = isset($input['status']) ? 1 : 0;
        return $game;
    }
}
