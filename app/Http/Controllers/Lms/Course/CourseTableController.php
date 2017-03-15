<?php

namespace App\Http\Controllers\Lms\Course;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Course\CourseRepository;
use App\Http\Requests\Lms\Course\ManageCourseRequest;

//use App\Models\Lms\Course\Course;



class CourseTableController extends Controller
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
     * @param ManageCourseRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCourseRequest $request)
    {
        $data = Datatables::of($this->courses->getForDataTable($request->get('status'), $request->get('trashed')  ))
    //        ->editColumn('confirmed', function ($course) {
    //            return $course->confirmed_label;
    //        })
    //        ->addColumn('roles', function ($user) {
    //            return $user->roles->count() ?
    //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
    //                trans('labels.general.none');
    //        })
            ->addColumn('modules', function ($course) {
                return $course->modules->count() ?
                    implode('<br/>', $course->modules->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
             ->addColumn('actions', function ($course) {
                return $course->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    
        return $data;
            
    }
    
}
