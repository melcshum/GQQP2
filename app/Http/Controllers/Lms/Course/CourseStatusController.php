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
    /* 
    public function getDeactivated(ManageUserRequest $request)
    {
        return view('backend.access.deactivated');
    }
    */
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
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
     /*
    public function mark(User $user, $status, ManageUserRequest $request)
    {
        $this->users->mark($user, $status);
        return redirect()->route($status == 1 ? 'admin.access.user.index' : 'admin.access.user.deactivated')->withFlashSuccess(trans('alerts.backend.users.updated'));
    }*/
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