<?php
namespace App\Http\Controllers\Lms\Course;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
//use App\Repositories\Backend\Access\User\UserRepository;
//use App\Http\Requests\Backend\Access\User\ManageUserRequest;

use App\Repositories\Lms\Course\CourseRepository;
use App\Http\Requests\Lms\Course\ManageCourseRequest;

use App\Models\Lms\Course\Course;

/**
 * Class CourseStatusController.
 */
class CourseStatusController extends Controller
{
    /**
     * @var CourseRepository
     */
    protected $courses;
    /**
     * @param CourseRepository $courses
     */
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses;
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
     
    public function getDeactivated(ManageCourseRequest $request)
    {
        
      //   return view('lms.course.index');
        return view('lms.course.deactivated');
    }
     
    /**
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageCourseRequest $request)
    {
        return view('lms.course.deleted');
    }
    
    /**
     * @param Course $course
     * @param $status
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
     
    public function mark(Course $course, $status, ManageCourseRequest $request)
    {
        $this->courses->mark($course, $status);
        return redirect()->route($status == 1 ? 'lms.course.index' : 'lms.course.deactivated')->withFlashSuccess(trans('alerts.lms.course.updated'));
    }
    /**
     * @param Course              $deletedCourse
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
     
    public function delete(Course $deletedCourse, ManageCourseRequest $request)
    {  
        $this->courses->forceDelete($deletedCourse);
       
         return redirect()->route('lms.course.deleted')->withFlashSuccess(trans('alerts.lms.courses.deleted_permanently'));
     }
    /**
     * @param Course              $restoreCourse
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function restore(Course $restoreCourse, ManageCourseRequest $request)
    { 
        $this->courses->restore($restoreCourse);
        return redirect()->route('lms.course.index')->withFlashSuccess(trans('alerts.lms.courses.restored'));
        
    }
}