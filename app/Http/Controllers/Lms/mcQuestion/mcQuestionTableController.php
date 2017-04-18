<?php

namespace App\Http\Controllers\Lms\mcQuestion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\mcQuestion\mcQuestionRepository;
use App\Http\Requests\Lms\mcQuestion\ManageMcQuestionRequest;

//use App\Models\Lms\Question\Question;



class mcQuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $mcQuestions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(mcQuestionRepository $mcQuestions)
    {
        $this->mcQuestions = $mcQuestions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageMcQuestionRequest $request)
    {
        $data = Datatables::of($this->mcQuestions->getForDataTable($request->get('status'), $request->get('trashed')  ))
            //        ->editColumn('confirmed', function ($question) {
            //            return $question->confirmed_label;
            //        })
            //        ->addColumn('roles', function ($user) {
            //            return $user->roles->count() ?
            //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
            //                trans('labels.general.none');
            //        })
//            ->addColumn('games', function ($question) {
//                return $question->games->count() ?
//                    implode('<br/>', $question->games->pluck('name')->toArray()) :
//                    trans('labels.general.none');
//            })

            ->addColumn('actions', function ($mcQuestion) {
                return $mcQuestion->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
