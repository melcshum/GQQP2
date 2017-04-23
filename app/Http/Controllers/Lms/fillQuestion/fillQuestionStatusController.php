<?php
namespace App\Http\Controllers\Lms\fillQuestion;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\fillQuestion\fillQuestionRepository;
use App\Http\Requests\Lms\fillQuestion\ManageFillQuestionRequest;

use App\Models\Lms\fillQuestion\fillQuestion;

/**
 * Class QuestionStatusController.
 */
class fillQuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageFillQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.fillQuestion.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageFillQuestionRequest $request)
    {
        return view('lms.fillQuestion.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(fillQuestion $fillQuestion, $status, ManageFillQuestionRequest $request)
    {
        $this->fillQuestions->mark($fillQuestion, $status);
        return redirect()->route($status == 1 ? 'lms.fillQuestion.index' : 'lms.fillQuestion.deactivated')->withFlashSuccess(trans('alerts.lms.fillQuestion.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(fillQuestion $deletedFillQuestion, ManageFillQuestionRequest $request)
    {
        $this->fillQuestions->forceDelete($deletedFillQuestion);

        return redirect()->route('lms.fillQuestion.deleted')->withFlashSuccess(trans('alerts.lms.fillQuestions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(fillQuestion $restoreFillQuestion, ManageFillQuestionRequest $request)
    {
        $this->fillQuestions->restore($restoreFillQuestion);
        return redirect()->route('lms.fillQuestion.index')->withFlashSuccess(trans('alerts.lms.fillQuestions.restored'));

    }
}