<?php

namespace App\Http\Controllers\Lms\Course;

use App\Models\Lms\Course\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Course\CourseRepository;
use App\Http\Requests\Lms\Course\StoreCourseRequest;
use App\Http\Requests\Lms\Course\ManageCourseRequest;
use App\Http\Requests\Lms\Course\UpdateCourseRequest;

class CourseController extends Controller
{
 
    /**
     * @var CourseRepository
     */
    protected $courses;

    /**
     * @param CourseRepository $courses
     * 
     */
    public function __construct(CourseRepository $courses)
    {
        $this->courses = $courses; 
    }
     
    /**
    * @param ManageUserRequest $request
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index(ManageCourseRequest $request)
    {
        return view('lms.course.index');
    }
    
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageCourseRequest $request)
    {
        return view('lms.course.create');
    }
    
    /**
    * @param StoreUserRequest $request
    *
    * @return mixed
    */
    public function store(StoreCourseRequest $request)
    {
         $this->courses->create(['data' => $request ]);

        return redirect()->route('lms.course.index')->withFlashSuccess(trans('alerts.lms.courses.created'));
    } 
    
    
    
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
//    public function show(User $user, ManageUserRequest $request)
//    {
//        return view('backend.access.show')
        //    ->withUser($user);
//    }

    /**
     * @param Course              $course
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function edit(Course $course, ManageCourseRequest $request)
    {
 
        return view('lms.course.edit')
            ->withCourse($course);
    }

   /**
     * @param Course              $course
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function update(Course $course, ManageCourseRequest $request)
    {
        $this->courses->update($course, ['data' => $request->all() ]);

        return redirect()->route('lms.course.index')->withFlashSuccess(trans('alerts.lms.courses.updated'));
    }

   /**
     * @param Course              $course
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function destroy(Course $course, ManageCourseRequest $request)
    {
        $this->courses->delete($course);

        return redirect()->route('lms.course.index')->withFlashSuccess(trans('alerts.lms.courses.deleted'));
    }
}
