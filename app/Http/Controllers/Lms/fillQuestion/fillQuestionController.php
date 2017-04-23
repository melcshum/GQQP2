<?php

namespace App\Http\Controllers\Lms\fillQuestion;

use App\Models\Lms\fillQuestion\fillQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\fillQuestion\fillQuestionRepository;
use App\Http\Requests\Lms\fillQuestion\StoreFillQuestionRequest;
use App\Http\Requests\Lms\fillQuestion\ManageFillQuestionRequest;
use App\Http\Requests\Lms\fillQuestion\UpdateFillQuestionRequest;
use Illuminate\Support\Facades\DB;

class fillQuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $fillQuestions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(fillQuestionRepository $fillQuestions)
    {
        $this->fillQuestions = $fillQuestions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageFillQuestionRequest $request)
    {
        return view('lms.fillQuestion.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageFillQuestionRequest $request)
    {
        return view('lms.fillQuestion.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreFillQuestionRequest $request)
    {
        $id = $request->id;

        $path = "";

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/fillQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/fillQuestion/'.$fileName;
        }

        if($request->knowledge < 0){
            return redirect()->route('lms.fillQuestion.create', $request->all())->withErrors('Knowledge must be integer');
        }

        if($request->gold < 0){
            return redirect()->route('lms.fillQuestion.create', $request->all())->withErrors('Gold must be integer');
        }

        if($request->time <= 0){
            return redirect()->route('lms.fillQuestion.create', $request->all())->withErrors('Time must be integer');
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->fillQuestions->create(['data' => $request ]);

        return redirect()->route('lms.fillQuestion.index')->withFlashSuccess(trans('alerts.lms.fillQuestions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(fillQuestion $fillQuestion, ManageFillQuestionRequest $request)
    {
        return view('lms.fillQuestion.show')
            ->withUser($fillQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(fillQuestion $fillQuestion, ManageFillQuestionRequest $request)
    {
        return view('lms.fillQuestion.edit')
            ->with('fillQuestion', $fillQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(fillQuestion $fillQuestion,  UpdateFillQuestionRequest $request)
    {
        $id = $request->id;

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/fillQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/fillQuestion/'.$fileName;

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
            return redirect()->route('lms.fillQuestion.edit', $id)->withErrors('Knowledge must be integer');
        }

        if($request->gold < 0){
            return redirect()->route('lms.fillQuestion.edit', $id)->withErrors('Gold must be integer');
        }

        if($request->time <= 0){
            return redirect()->route('lms.fillQuestion.edit', $id)->withErrors('Time must be integer');
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->fillQuestions->update($fillQuestion, ['data' => $input ]);

        return redirect()->route('lms.fillQuestion.index')->withFlashSuccess(trans('alerts.lms.fillQuestions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(fillQuestion $fillQuestion, ManageFillQuestionRequest $request)
    {
        $this->fillQuestions->delete($fillQuestion);

        return redirect()->route('lms.fillQuestion.deleted')->withFlashSuccess(trans('alerts.lms.fillQuestions.deleted'));
    }
}
