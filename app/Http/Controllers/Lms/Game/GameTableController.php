<?php

namespace App\Http\Controllers\Lms\Game;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Game\GameRepository;
use App\Http\Requests\Lms\Game\ManageGameRequest;

//use App\Models\Lms\Game\Game;



class GameTableController extends Controller
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
     * @param ManageGameRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageGameRequest $request)
    {
        $data = Datatables::of($this->games->getForDataTable($request->get('status'), $request->get('trashed')  ))
            //        ->editColumn('confirmed', function ($game) {
            //            return $game->confirmed_label;
            //        })
            //        ->addColumn('roles', function ($user) {
            //            return $user->roles->count() ?
            //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
            //                trans('labels.general.none');
            //        })
            ->addColumn('actions', function ($game) {
                return $game->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}