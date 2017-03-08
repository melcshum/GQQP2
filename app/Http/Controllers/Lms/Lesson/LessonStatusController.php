<?php
namespace App\Http\Controllers\Lms\Lesson;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;

use App\Repositories\Lms\Lesson\LessonRepository;
use App\Http\Requests\Lms\Lesson\ManageLessonRequest;

use App\Models\Lms\Lesson\Lesson;

/**
 * Class LessonStatusController.
 */
class LessonStatusController extends Controller
{
    /**
     * @var LessonRepository
     */
    protected $lessons;
    /**
     * @param LessonRepository $lessons
     */
    public function __construct(LessonRepository $lessons)
    {
        $this->lessons = $lessons;
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
     
    public function getDeactivated(ManageLessonRequest $request)
    {
        
      //   return view('lms.lesson.index');
        return view('lms.lesson.deactivated');
    }
     
    /**
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageLessonRequest $request)
    {
        return view('lms.lesson.deleted');
    }
    
    /**
     * @param Lesson $lesson
     * @param $status
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
     
    public function mark(Lesson $lesson, $status, ManageLessonRequest $request)
    {
        $this->lessons->mark($lesson, $status);
        return redirect()->route($status == 1 ? 'lms.lesson.index' : 'lms.lesson.deactivated')->withFlashSuccess(trans('alerts.lms.lesson.updated'));
    }
    /**
     * @param Lesson              $deletedLesson
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
     
    public function delete(Lesson $deletedLesson, ManageLessonRequest $request)
    {  
        $this->lessons->forceDelete($deletedLesson);
       
         return redirect()->route('lms.lesson.deleted')->withFlashSuccess(trans('alerts.lms.lessons.deleted_permanently'));
     }
    /**
     * @param Lesson              $restoreLesson
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function restore(Lesson $restoreLesson, ManageLessonRequest $request)
    { 
        $this->lessons->restore($restoreLesson);
        return redirect()->route('lms.lesson.index')->withFlashSuccess(trans('alerts.lms.lessons.restored'));
        
    }
}