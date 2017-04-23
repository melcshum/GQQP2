<?php
namespace App\Http\Controllers\Lms\arrayQuestion;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\arrayQuestion\arrayQuestionRepository;
use App\Http\Requests\Lms\arrayQuestion\ManagearrayQuestionRequest;

use App\Models\Lms\arrayQuestion\arrayQuestion;

/**
 * Class QuestionStatusController.
 */
class arrayQuestionStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManagearrayQuestionRequest $request)
    {

        //   return view('lms.question.index');
        return view('lms.arrayQuestion.deactivated');
    }

    /**
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManagearrayQuestionRequest $request)
    {
        return view('lms.arrayQuestion.deleted');
    }

    /**
     * @param Question $question
     * @param $status
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function mark(arrayQuestion $arrayQuestion, $status, ManagearrayQuestionRequest $request)
    {
        $this->arrayQuestions->mark($arrayQuestion, $status);
        return redirect()->route($status == 1 ? 'lms.arrayQuestion.index' : 'lms.arrayQuestion.deactivated')->withFlashSuccess(trans('alerts.lms.arrayQuestion.updated'));
    }
    /**
     * @param Question              $deletedQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */

    public function delete(arrayQuestion $deletedarrayQuestion, ManagearrayQuestionRequest $request)
    {
        $this->arrayQuestions->forceDelete($deletedarrayQuestion);

        return redirect()->route('lms.arrayQuestion.deleted')->withFlashSuccess(trans('alerts.lms.arrayQuestions.deleted_permanently'));
    }
    /**
     * @param Question              $restoreQuestion
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function restore(arrayQuestion $restorearrayQuestion, ManagearrayQuestionRequest $request)
    {
        $this->arrayQuestions->restore($restorearrayQuestion);
        return redirect()->route('lms.arrayQuestion.index')->withFlashSuccess(trans('alerts.lms.arrayQuestions.restored'));

    }
}