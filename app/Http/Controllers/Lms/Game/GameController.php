<?php

namespace App\Http\Controllers\Lms\Game;

use App\Models\Lms\Game\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Game\GameRepository;
use App\Http\Requests\Lms\Game\StoreGameRequest;
use App\Http\Requests\Lms\Game\ManageGameRequest;
use App\Http\Requests\Lms\Game\UpdateGameRequest;
class GameController extends Controller
{
    /**
     * @var GameRepository
     */
    protected $games;
    /**
     * @param GameRepository $games
     *
     */
    public function __construct(GameRepository $games)
    {
        $this->games = $games;
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGameRequest $request)
    {
        return view('lms.game.index');
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageGameRequest $request)
    {
        return view('lms.game.create');
    }
    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreGameRequest $request)
    {
        $this->games->create(['data' => $request ]);
        return redirect()->route('lms.game.index')->withFlashSuccess(trans('alerts.lms.games.created'));
    }
    /**
     * @param User              $game
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(Game $game, ManageGameRequest $request)
    {
        return view('lms.game.show')
            ->withUser($game);
    }
    /**
     * @param Game              $game
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function edit(Game $game, ManageGameRequest $request)
    {
        return view('lms.game.edit')
            ->withGame($game);
    }
    /**
     * @param Game            $game
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function update(Game $game, ManageGameRequest $request)
    {
        $this->games->update($game, ['data' => $request->all() ]);
        return redirect()->route('lms.game.index')->withFlashSuccess(trans('alerts.lms.games.updated'));
    }
    /**
     * @param Game              $game
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function destroy(Game $game, ManageGameRequest $request)
    {
        $this->games->delete($game);
        return redirect()->route('lms.game.deleted')->withFlashSuccess(trans('alerts.lms.games.deleted'));
    }
}
