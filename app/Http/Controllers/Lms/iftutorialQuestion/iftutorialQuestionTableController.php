<?php

namespace App\Http\Controllers\Lms\iftutorialQuestion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\iftutorialQuestion\iftutorialQuestionRepository;
use App\Http\Requests\Lms\iftutorialQuestion\ManageiftutorialQuestionRequest;

//use App\Models\Lms\Question\Question;



class iftutorialQuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $iftutorialQuestions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(iftutorialQuestionRepository $iftutorialQuestions)
    {
        $this->iftutorialQuestions = $iftutorialQuestions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageiftutorialQuestionRequest $request)
    {
        $data = Datatables::of($this->iftutorialQuestions->getForDataTable($request->get('status'), $request->get('trashed')  ))
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

            ->addColumn('actions', function ($iftutorialQuestion) {
                return $iftutorialQuestion->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
