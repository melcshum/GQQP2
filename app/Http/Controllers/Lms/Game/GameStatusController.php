<?php
namespace App\Http\Controllers\Lms\Game;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\Game\GameRepository;
use App\Http\Requests\Lms\Game\ManageGameRequest;

use App\Models\Lms\Game\Game;

/**
 * Class GameStatusController.
 */
class GameStatusController extends Controller
{
    /**
     * @var GameRepository
     */
    protected $games;
    /**
     * @param GameRepository $games
     */
    public function __construct(GameRepository $games)
    {
        $this->games = $games;
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageGameRequest $request)
    {

        //   return view('lms.game.index');
        return view('lms.game.deactivated');
    }

    /**
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageGameRequest $request)
    {
        return view('lms.game.deleted');
    }

    /**
     * @param Game $game
     * @param $status
     * @param ManageGameRequest $request
     *
     * @return mixed
     */

    public function mark(Game $game, $status, ManageGameRequest $request)
    {
        $this->games->mark($game, $status);
        return redirect()->route($status == 1 ? 'lms.game.index' : 'lms.game.deactivated')->withFlashSuccess(trans('alerts.lms.game.updated'));
    }
    /**
     * @param Game              $deletedGame
     * @param ManageGameRequest $request
     *
     * @return mixed
     */

    public function delete(Game $deletedGame, ManageGameRequest $request)
    {
        $this->games->forceDelete($deletedGame);

        return redirect()->route('lms.game.deleted')->withFlashSuccess(trans('alerts.lms.games.deleted_permanently'));
    }
    /**
     * @param Game              $restoreGame
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function restore(Game $restoreGame, ManageGameRequest $request)
    {
        $this->games->restore($restoreGame);
        return redirect()->route('lms.game.index')->withFlashSuccess(trans('alerts.lms.games.restored'));

    }
}