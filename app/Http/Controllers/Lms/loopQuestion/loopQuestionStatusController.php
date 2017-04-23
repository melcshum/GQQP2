<?php
namespace App\Http\Controllers\Lms\loopQuestion;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\loopQuestion\loopQuestionRepository;
use App\Http\Requests\Lms\loopQuestion\ManageLoopQuestionRequest;

use App\Models\Lms\loopQuestion\loopQuestion;

/**
 * Class QuestionStatusController.
 */
class loopQuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageLoopQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.loopQuestion.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageLoopQuestionRequest $request)
    {
        return view('lms.loopQuestion.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(loopQuestion $loopQuestion, $status, ManageLoopQuestionRequest $request)
    {
        $this->loopQuestions->mark($loopQuestion, $status);
        return redirect()->route($status == 1 ? 'lms.loopQuestion.index' : 'lms.loopQuestion.deactivated')->withFlashSuccess(trans('alerts.lms.loopQuestion.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(loopQuestion $deletedLoopQuestion, ManageLoopQuestionRequest $request)
    {
        $this->loopQuestions->forceDelete($deletedLoopQuestion);

        return redirect()->route('lms.loopQuestion.deleted')->withFlashSuccess(trans('alerts.lms.loopQuestions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(loopQuestion $restoreLoopQuestion, ManageLoopQuestionRequest $request)
    {
        $this->loopQuestions->restore($restoreLoopQuestion);
        return redirect()->route('lms.loopQuestion.index')->withFlashSuccess(trans('alerts.lms.loopQuestions.restored'));

    }
}