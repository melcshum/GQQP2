<?php

namespace App\Http\Controllers\Lms\iftutorialQuestion;

use App\Models\Lms\iftutorialQuestion\iftutorialQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\iftutorialQuestion\iftutorialQuestionRepository;
use App\Http\Requests\Lms\iftutorialQuestion\StoreIftutorialQuestionRequest;
use App\Http\Requests\Lms\iftutorialQuestion\ManageIftutorialQuestionRequest;
use App\Http\Requests\Lms\iftutorialQuestion\UpdateIftutorialQuestionRequest;
use Illuminate\Support\Facades\DB;

class iftutorialQuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $iftutorialQuestions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(iftutorialQuestionRepository $iftutorialQuestions)
    {
        $this->iftutorialQuestions = $iftutorialQuestions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageiftutorialQuestionRequest $request)
    {
        return view('lms.iftutorialQuestion.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageiftutorialQuestionRequest $request)
    {
        return view('lms.iftutorialQuestion.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreiftutorialQuestionRequest $request)
    {
        $id = $request->id;

        $path = "";

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/iftutorialQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/iftutorialQuestion/'.$fileName;
        }


        $input = $request->all();
        $input['photo'] = $path;

        $this->iftutorialQuestions->create(['data' => $request ]);

        return redirect()->route('lms.iftutorialQuestion.index')->withFlashSuccess(trans('alerts.lms.iftutorialQuestions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(iftutorialQuestion $iftutorialQuestion, ManageiftutorialQuestionRequest $request)
    {
        return view('lms.iftutorialQuestion.show')
            ->withUser($iftutorialQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(iftutorialQuestion $iftutorialQuestion, ManageiftutorialQuestionRequest $request)
    {
        return view('lms.iftutorialQuestion.edit')
            ->with('iftutorialQuestion', $iftutorialQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(iftutorialQuestion $iftutorialQuestion,  UpdateiftutorialQuestionRequest $request)
    {
        $id = $request->id;

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/iftutorialQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/iftutorialQuestion/'.$fileName;

        }
//        else{
//            if(DB::table('iftutorialQuestions')->where('id', '=', $id) ->whereNotNull('photo')){
//                $path = DB::table('iftutorialQuestions')->where('id', '=', $id) ->pluck('photo');
//                dd($path);
//            }else{
//                return redirect()->route('lms.iftutorialQuestion.edit', $id)->withErrors('Photo is required');
//            }
//        }



        if($request->time <= 0){
            return redirect()->route('lms.iftutorialQuestion.edit', $id)->withErrors('Time must be integer');
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->iftutorialQuestions->update($iftutorialQuestion, ['data' => $input ]);

        return redirect()->route('lms.iftutorialQuestion.index')->withFlashSuccess(trans('alerts.lms.iftutorialQuestions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(iftutorialQuestion $iftutorialQuestion, ManageiftutorialQuestionRequest $request)
    {
        $this->iftutorialQuestions->delete($iftutorialQuestion);

        return redirect()->route('lms.iftutorialQuestion.deleted')->withFlashSuccess(trans('alerts.lms.iftutorialQuestions.deleted'));
    }
}
