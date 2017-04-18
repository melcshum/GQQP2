<?php
namespace App\Http\Controllers\Lms\mcQuestion;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\mcQuestion\mcQuestionRepository;
use App\Http\Requests\Lms\mcQuestion\ManageMcQuestionRequest;

use App\Models\Lms\mcQuestion\mcQuestion;

/**
 * Class QuestionStatusController.
 */
class mcQuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageMcQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.mcQuestion.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageMcQuestionRequest $request)
    {
        return view('lms.mcQuestion.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(mcQuestion $mcQuestions, $status, ManageMcQuestionRequest $request)
    {
        $this->mcQuestions->mark($mcQuestions, $status);
        return redirect()->route($status == 1 ? 'lms.mcQuestion.index' : 'lms.mcQuestion.deactivated')->withFlashSuccess(trans('alerts.lms.mcQuestion.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(mcQuestion $deletedMcQuestion, ManageMcQuestionRequest $request)
    {
        $this->mcQuestions->forceDelete($deletedMcQuestion);

        return redirect()->route('lms.mcQuestion.deleted')->withFlashSuccess(trans('alerts.lms.mcQuestions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(mcQuestion $restoreMcQuestion, ManageMcQuestionRequest $request)
    {
        $this->mcQuestions->restore($restoreMcQuestion);
        return redirect()->route('lms.mcQuestion.index')->withFlashSuccess(trans('alerts.lms.mcQuestions.restored'));

    }
}