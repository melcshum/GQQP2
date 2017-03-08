<?php

namespace App\Http\Controllers\Lms\Lesson;

use App\Models\Lms\Lesson\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Lesson\LessonRepository;
use App\Http\Requests\Lms\Lesson\StoreLessonRequest;
use App\Http\Requests\Lms\Lesson\ManageLessonRequest;
use App\Http\Requests\Lms\Lesson\UpdateLessonRequest;

class LessonController extends Controller
{
 
    /**
     * @var LessonRepository
     */
    protected $lessons;

    /**
     * @param LessonRepository $lessons
     * 
     */
    public function __construct(LessonRepository $lessons)
    {
        $this->lessons = $lessons;
    }
     
    /**
    * @param ManageUserRequest $request
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index(ManageLessonRequest $request)
    {
        return view('lms.lesson.index');
    }
    
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageLessonRequest $request)
    {
        return view('lms.lesson.create');
    }
    
    /**
    * @param StoreUserRequest $request
    *
    * @return mixed
    */
    public function store(StoreLessonRequest $request)
    {
         $this->lessons->create(['data' => $request ]);

        return redirect()->route('lms.lesson.index')->withFlashSuccess(trans('alerts.lms.lessons.created'));
    } 
    
    
    
    /**
     * @param User              $lesson
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
   public function show(Lesson $lesson, ManageLessonRequest $request)
    {
        return view('lms.lesson.show')
            ->withUser($lesson);
    }

    /**
     * @param Lesson              $lesson
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function edit(Lesson $lesson, ManageLessonRequest $request)
    { 
        return view('lms.lesson.edit')
            ->withLesson(lesson);
    }

   /**
     * @param Lesson              $lesson
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function update(Lesson $lesson, ManageLessonRequest $request)
    {
        $this->lessons->update($lesson, ['data' => $request->all() ]);

        return redirect()->route('lms.lesson.index')->withFlashSuccess(trans('alerts.lms.lessons.updated'));
    }

   /**
     * @param Lesson              $lesson
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function destroy(Lesson $lesson, ManageLessonRequest $request)
    {
        $this->lessons->delete($lesson);

        return redirect()->route('lms.lesson.deleted')->withFlashSuccess(trans('alerts.lms.lessons.deleted'));
    }
}
