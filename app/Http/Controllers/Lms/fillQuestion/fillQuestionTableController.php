<?php

namespace App\Http\Controllers\Lms\fillQuestion;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\fillQuestion\fillQuestionRepository;
use App\Http\Requests\Lms\fillQuestion\ManageFillQuestionRequest;

//use App\Models\Lms\Question\Question;



class fillQuestionTableController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $fillQuestions;

    /**
     * @param QuestionRepository $questions
     */
    public function __construct(fillQuestionRepository $fillQuestions)
    {
        $this->fillQuestions = $fillQuestions;
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFillQuestionRequest $request)
    {
        $data = Datatables::of($this->fillQuestions->getForDataTable($request->get('status'), $request->get('trashed')  ))
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

            ->addColumn('actions', function ($fillQuestion) {
                return $fillQuestion->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
