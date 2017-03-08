<?php

namespace App\Http\Controllers\Lms\Question;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Question\QuestionRepository;
use App\Http\Requests\Lms\Question\ManageQuestionRequest;

//use App\Models\Lms\Question\Question;



class QuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $questions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageQuestionRequest $request)
    {
        $data = Datatables::of($this->questions->getForDataTable($request->get('status'), $request->get('trashed')  ))
            //        ->editColumn('confirmed', function ($question) {
            //            return $question->confirmed_label;
            //        })
            //        ->addColumn('roles', function ($user) {
            //            return $user->roles->count() ?
            //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
            //                trans('labels.general.none');
            //        })
            ->addColumn('games', function ($question) {
                return $question->games->count() ?
                    implode('<br/>', $question->games->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })

            ->addColumn('actions', function ($question) {
                return $question->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
