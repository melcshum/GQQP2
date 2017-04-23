<?php
namespace App\Http\Controllers\Lms\iftutorialQuestion;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\iftutorialQuestion\iftutorialQuestionRepository;
use App\Http\Requests\Lms\iftutorialQuestion\ManageIftutorialQuestionRequest;

use App\Models\Lms\iftutorialQuestion\iftutorialQuestion;

/**
 * Class QuestionStatusController.
 */
class iftutorialQuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageiftutorialQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.iftutorialQuestion.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageiftutorialQuestionRequest $request)
    {
        return view('lms.iftutorialQuestion.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(iftutorialQuestion $iftutorialQuestion, $status, ManageiftutorialQuestionRequest $request)
    {
        $this->iftutorialQuestions->mark($iftutorialQuestion, $status);
        return redirect()->route($status == 1 ? 'lms.iftutorialQuestion.index' : 'lms.iftutorialQuestion.deactivated')->withFlashSuccess(trans('alerts.lms.iftutorialQuestion.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(iftutorialQuestion $deletediftutorialQuestion, ManageiftutorialQuestionRequest $request)
    {
        $this->iftutorialQuestions->forceDelete($deletediftutorialQuestion);

        return redirect()->route('lms.iftutorialQuestion.deleted')->withFlashSuccess(trans('alerts.lms.iftutorialQuestions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(iftutorialQuestion $restoreiftutorialQuestion, ManageiftutorialQuestionRequest $request)
    {
        $this->iftutorialQuestions->restore($restoreiftutorialQuestion);
        return redirect()->route('lms.iftutorialQuestion.index')->withFlashSuccess(trans('alerts.lms.iftutorialQuestions.restored'));

    }
}