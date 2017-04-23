<?php

namespace App\Http\Controllers\Lms\arrayQuestion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\arrayQuestion\arrayQuestionRepository;
use App\Http\Requests\Lms\arrayQuestion\ManageArrayQuestionRequest;

//use App\Models\Lms\Question\Question;



class arrayQuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $arrayQuestions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(arrayQuestionRepository $arrayQuestions)
    {
        $this->arrayQuestions = $arrayQuestions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagearrayQuestionRequest $request)
    {
        $data = Datatables::of($this->arrayQuestions->getForDataTable($request->get('status'), $request->get('trashed')  ))
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

            ->addColumn('actions', function ($arrayQuestion) {
                return $arrayQuestion->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
