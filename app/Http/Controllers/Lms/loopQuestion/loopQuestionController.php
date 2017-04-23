<?php

namespace App\Http\Controllers\Lms\loopQuestion;

use App\Models\Lms\loopQuestion\loopQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\loopQuestion\loopQuestionRepository;
use App\Http\Requests\Lms\loopQuestion\StoreLoopQuestionRequest;
use App\Http\Requests\Lms\loopQuestion\ManageLoopQuestionRequest;
use App\Http\Requests\Lms\loopQuestion\UpdateLoopQuestionRequest;
use Illuminate\Support\Facades\DB;

class loopQuestionController extends Controller
{

    /**
     * @var QuestionRepository
     */
    protected $loopQuestions;

    /**
     * @param QuestionRepository $questions
     *
     */
    public function __construct(loopQuestionRepository $loopQuestions)
    {
        $this->loopQuestions = $loopQuestions;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageLoopQuestionRequest $request)
    {
        return view('lms.loopQuestion.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageLoopQuestionRequest $request)
    {
        return view('lms.loopQuestion.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreLoopQuestionRequest $request)
    {
        $id = $request->id;

        $path = "";

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/loopQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/loopQuestion/'.$fileName;
        }

        $input = $request->all();
        $input['photo'] = $path;

        $this->loopQuestions->create(['data' => $request ]);

        return redirect()->route('lms.loopQuestion.index')->withFlashSuccess(trans('alerts.lms.loopQuestions.created'));
    }



    /**
     * @param User              $question
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(loopQuestion $loopQuestion, ManageLoopQuestionRequest $request)
    {
        return view('lms.loopQuestion.show')
            ->withUser($loopQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function edit(loopQuestion $loopQuestion, ManageLoopQuestionRequest $request)
    {
        return view('lms.loopQuestion.edit')
            ->with('loopQuestion', $loopQuestion);
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function update(loopQuestion $loopQuestion,  UpdateLoopQuestionRequest $request)
    {
        $id = $request->id;

        if($request->hasFile('photo')){
            $destinationPath=public_path().'/images/loopQuestion/';
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $request->file('photo')->move($destinationPath, $fileName);

            $path = './images/loopQuestion/'.$fileName;

        }
//        else{
//            if(DB::table('loopQuestions')->where('id', '=', $id) ->whereNotNull('photo')){
//                $path = DB::table('loopQuestions')->where('id', '=', $id) ->pluck('photo');
//                dd($path);
//            }else{
//                return redirect()->route('lms.loopQuestion.edit', $id)->withErrors('Photo is required');
//            }
//        }


        $input = $request->all();
        $input['photo'] = $path;

        $this->loopQuestions->update($loopQuestion, ['data' => $input ]);

        return redirect()->route('lms.loopQuestion.index')->withFlashSuccess(trans('alerts.lms.loopQuestions.updated'));
    }

    /**
     * @param Question              $question
     * @param ManageQuestionRequest $request
     *
     * @return mixed
     */
    public function destroy(loopQuestion $loopQuestion, ManageLoopQuestionRequest $request)
    {
        $this->loopQuestions->delete($loopQuestion);

        return redirect()->route('lms.loopQuestion.deleted')->withFlashSuccess(trans('alerts.lms.loopQuestions.deleted'));
    }
}
