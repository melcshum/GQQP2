<?php
namespace App\Http\Controllers\Lms\Question;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\Question\QuestionRepository;
use App\Http\Requests\Lms\Question\ManageQuestionRequest;

use App\Models\Lms\Question\Question;

/**
 * Class QuestionStatusController.
 */
class QuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.question.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageQuestionRequest $request)
    {
        return view('lms.question.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(Question $question, $status, ManageQuestionRequest $request)
    {
        $this->questions->mark($question, $status);
        return redirect()->route($status == 1 ? 'lms.question.index' : 'lms.question.deactivated')->withFlashSuccess(trans('alerts.lms.question.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(Question $deletedQuestion, ManageQuestionRequest $request)
    {
        $this->questions->forceDelete($deletedQuestion);

        return redirect()->route('lms.question.deleted')->withFlashSuccess(trans('alerts.lms.questions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(Question $restoreQuestion, ManageQuestionRequest $request)
    {
        $this->questions->restore($restoreQuestion);
        return redirect()->route('lms.question.index')->withFlashSuccess(trans('alerts.lms.questions.restored'));

    }
}