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

}
