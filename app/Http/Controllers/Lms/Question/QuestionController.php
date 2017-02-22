<?php

namespace App\Http\Controllers\Lms\Question;

use App\Models\Lms\Question\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Question\QuestionRepository;
use App\Http\Requests\Lms\Question\StoreQuestionRequest;
use App\Http\Requests\Lms\Question\ManageQuestionRequest;
use App\Http\Requests\Lms\Question\UpdateQuestionRequest;

class QuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $questions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageQuestionRequest $request)
    {
        return view('lms.question.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageQuestionRequest $request)
    {
        return view('lms.question.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->questions->create(['data' => $request ]);

        return redirect()->route('lms.question.index')->withFlashSuccess(trans('alerts.lms.questions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(Question $question, ManageQuestionRequest $request)
    {
        return view('lms.question.show')
            ->withUser($question);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(Question $question, ManageQuestionRequest $request)
    {
        return view('lms.question.edit')
            ->withQuestion($question);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(Question $question, ManageQuestionRequest $request)
    {
        $this->questions->update($question, ['data' => $request->all() ]);

        return redirect()->route('lms.question.index')->withFlashSuccess(trans('alerts.lms.questions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(Question $question, ManageQuestionRequest $request)
    {
        $this->questions->delete($question);

        return redirect()->route('lms.question.deleted')->withFlashSuccess(trans('alerts.lms.questions.deleted'));
    }
}
