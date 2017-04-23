<?php

namespace App\Http\Controllers\Lms\arrayQuestion;

use App\Models\Lms\arrayQuestion\arrayQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\arrayQuestion\arrayQuestionRepository;
use App\Http\Requests\Lms\arrayQuestion\StorearrayQuestionRequest;
use App\Http\Requests\Lms\arrayQuestion\ManagearrayQuestionRequest;
use App\Http\Requests\Lms\arrayQuestion\UpdatearrayQuestionRequest;
use Illuminate\Support\Facades\DB;

class arrayQuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $arrayQuestions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(arrayQuestionRepository $arrayQuestions)
    {
        $this->arrayQuestions = $arrayQuestions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageArrayQuestionRequest $request)
    {
        return view('lms.arrayQuestion.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageArrayQuestionRequest $request)
    {
        return view('lms.arrayQuestion.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreArrayQuestionRequest $request)
    {
        $id = $request->id;

        $path = "";

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/arrayQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/arrayQuestion/'.$fileName;
        }


        $input = $request->all();
        $input['photo'] = $path;

        $this->arrayQuestions->create(['data' => $request ]);

        return redirect()->route('lms.arrayQuestion.index')->withFlashSuccess(trans('alerts.lms.arrayQuestions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(arrayQuestion $arrayQuestion, ManagearrayQuestionRequest $request)
    {
        return view('lms.arrayQuestion.show')
            ->withUser($arrayQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(arrayQuestion $arrayQuestion, ManagearrayQuestionRequest $request)
    {
        return view('lms.arrayQuestion.edit')
            ->with('arrayQuestion', $arrayQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(arrayQuestion $arrayQuestion,  UpdatearrayQuestionRequest $request)
    {
        $id = $request->id;

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/arrayQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/arrayQuestion/'.$fileName;

        }
//        else{
//            if(DB::table('arrayQuestions')->where('id', '=', $id) ->whereNotNull('photo')){
//                $path = DB::table('arrayQuestions')->where('id', '=', $id) ->pluck('photo');
//                dd($path);
//            }else{
//                return redirect()->route('lms.arrayQuestion.edit', $id)->withErrors('Photo is required');
//            }
//        }


        $input = $request->all();
        $input['photo'] = $path;

        $this->arrayQuestions->update($arrayQuestion, ['data' => $input ]);

        return redirect()->route('lms.arrayQuestion.index')->withFlashSuccess(trans('alerts.lms.arrayQuestions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(arrayQuestion $arrayQuestion, ManagearrayQuestionRequest $request)
    {
        $this->arrayQuestions->delete($arrayQuestion);

        return redirect()->route('lms.arrayQuestion.deleted')->withFlashSuccess(trans('alerts.lms.arrayQuestions.deleted'));
    }
}
