<?php

namespace App\Http\Controllers\Lms\loopQuestion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\loopQuestion\loopQuestionRepository;
use App\Http\Requests\Lms\loopQuestion\ManageLoopQuestionRequest;

//use App\Models\Lms\Question\Question;



class loopQuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $loopQuestions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(loopQuestionRepository $loopQuestions)
    {
        $this->loopQuestions = $loopQuestions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLoopQuestionRequest $request)
    {
        $data = Datatables::of($this->loopQuestions->getForDataTable($request->get('status'), $request->get('trashed')  ))
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

            ->addColumn('actions', function ($loopQuestion) {
                return $loopQuestion->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
