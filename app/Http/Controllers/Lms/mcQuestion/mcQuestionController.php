<?php

namespace App\Http\Controllers\Lms\mcQuestion;

use App\Models\Lms\mcQuestion\mcQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\mcQuestion\mcQuestionRepository;
use App\Http\Requests\Lms\mcQuestion\StoreMcQuestionRequest;
use App\Http\Requests\Lms\mcQuestion\ManageMcQuestionRequest;
use App\Http\Requests\Lms\mcQuestion\UpdateMcQuestionRequest;
use Illuminate\Support\Facades\DB;

class mcQuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $mcQuestions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(mcQuestionRepository $mcQuestions)
    {
        $this->mcQuestions = $mcQuestions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageMcQuestionRequest $request)
    {
        return view('lms.mcQuestion.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageMcQuestionRequest $request)
    {
        return view('lms.mcQuestion.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreMcQuestionRequest $request)
    {
        $id = $request->id;

        $path = "";

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/mcQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/mcQuestion/'.$fileName;
        }

        if($request->knowledge < 0){
            return redirect()->route('lms.mcQuestion.create', $request->all())->withErrors('Knowledge must be integer');
        }

        if($request->gold < 0){
            return redirect()->route('lms.mcQuestion.create', $request->all())->withErrors('Gold must be integer');
        }

        if($request->time <= 0){
            return redirect()->route('lms.mcQuestion.create', $request->all())->withErrors('Time must be integer');
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->mcQuestions->create(['data' => $request ]);

        return redirect()->route('lms.mcQuestion.index')->withFlashSuccess(trans('alerts.lms.mcQuestions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(mcQuestion $mcQuestion, ManageMcQuestionRequest $request)
    {
        return view('lms.mcQuestion.show')
            ->withUser($mcQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(mcQuestion $mcQuestion, ManageMcQuestionRequest $request)
    {
        return view('lms.mcQuestion.edit')
            ->with('mcQuestion', $mcQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(mcQuestion $mcQuestion,  UpdateMcQuestionRequest $request)
    {
        $id = $request->id;

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/mcQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/mcQuestion/'.$fileName;

        }
//        else{
//            if(DB::table('mcQuestions')->where('id', '=', $id) ->whereNotNull('photo')){
//                $path = DB::table('mcQuestions')->where('id', '=', $id) ->pluck('photo');
//                dd($path);
//            }else{
//                return redirect()->route('lms.mcQuestion.edit', $id)->withErrors('Photo is required');
//            }
//        }

        if($request->knowledge < 0){
            return redirect()->route('lms.mcQuestion.edit', $id)->withErrors('Knowledge must be integer');
        }

        if($request->gold < 0){
            return redirect()->route('lms.mcQuestion.edit', $id)->withErrors('Gold must be integer');
        }

        if($request->time <= 0){
            return redirect()->route('lms.mcQuestion.edit', $id)->withErrors('Time must be integer');
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->mcQuestions->update($mcQuestion, ['data' => $input ]);

        return redirect()->route('lms.mcQuestion.index')->withFlashSuccess(trans('alerts.lms.mcQuestions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(mcQuestion $mcQuestion, ManageMcQuestionRequest $request)
    {
        $this->mcQuestions->delete($mcQuestion);

        return redirect()->route('lms.mcQuestion.deleted')->withFlashSuccess(trans('alerts.lms.mcQuestions.deleted'));
    }
}
