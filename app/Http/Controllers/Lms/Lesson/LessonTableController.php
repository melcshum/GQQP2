<?php

namespace App\Http\Controllers\Lms\Lesson;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Lesson\LessonRepository;
use App\Http\Requests\Lms\Lesson\ManageLessonRequest;

//use App\Models\Lms\Lesson\Lesson;



class LessonTableController extends Controller
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
     * @param ManageLessonRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageLessonRequest $request)
    {
        $data = Datatables::of($this->lessons->getForDataTable($request->get('status'), $request->get('trashed')  ))
    //        ->editColumn('confirmed', function ($lesson) {
    //            return $lesson->confirmed_label;
    //        })
    //        ->addColumn('roles', function ($user) {
    //            return $user->roles->count() ?
    //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
    //                trans('labels.general.none');
    //        })
            ->addColumn('modules', function ($lesson) {
                return $lesson->modules->count() ?
                    implode('<br/>', $lesson->modules->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
             ->addColumn('actions', function ($lesson) {
                return $lesson->action_buttons;
            })
            ->withTrashed()
            ->make(true);
    
        return $data;
            
    }
    
}
