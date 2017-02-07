<?php

namespace App\Repositories\Lms\Course;

use App\Models\Lms\Course\Course;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use App\Events\Lms\Course\CourseCreated;


use App\Events\Lms\Course\CourseDeleted;
use App\Events\Lms\Course\CourseUpdated;
/*
use App\Events\Lms\Course\CourseRestored;
use App\Eventsms\course\CourseDeactivated;
use App\Eventsms\course\CourseReactivated;
use App\Eventsms\course\CoursePermanentlyDeleted;
use App\Notifications\Frontend\Auth\CourseNeedsConfirmation;
*/

/**
 * Class CourseRepository.
 */
class CourseRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Course::class;

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param int  $status
     * @param bool $trashed
     *
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        $dataTableQuery = $this->query()

            ->select([
                config('lms.courses_table').'.id',
                config('lms.courses_table').'.name',
                config('lms.courses_table').'.description',
//                config('lms.courses_table').'.level',
//                config('lms.courses_table').'.type',
//                config('lms.courses_table').'.slug',
                config('lms.courses_table').'.created_at',
                config('lms.courses_table').'.updated_at',
                config('lms.courses_table').'.deleted_at',
            ]);

        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the UserScope trait
        //return $dataTableQuery->active($status);
        return $dataTableQuery;
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $course = $this->createCourseStub($data);

        DB::transaction(function () use ($course, $data) {
            if (parent::save($course)) {

                //User Created, Validate Roles
           //     if (! count($roles['assignees_roles'])) {
          //          throw new GeneralException(trans('exceptions.backend.access.users.role_needed_create'));
          //    }

                //Attach new roles
          //      $user->attachRoles($roles['assignees_roles']);

                //Send confirmation email if requested
          //    if (isset($data['confirmation_email']) && $user->confirmed == 0) {
          //          $user->notify(new UserNeedsConfirmation($user->confirmation_code));
          //      }

                event(new CourseCreated($course));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.course.create_error'));
        });
    }

    /**
     * @param Model $course
     * @param array $input
     */
    public function update(Model $course, array $input)
    {
        $data = $input['data']; 
        $course->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($course, $data ) {
            if ( parent::update($course, $data)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
         //     parent::save($course);
              //  $user->confirmed = isset($data['confirmed']) ? 1 : 0;
           
 
             //   $this->checkUserRolesCount($roles);
             //   $this->flushRoles($roles, $user);

               event(new CourseUpdated($course));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $course
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $course)
    {
 
        if (parent::delete($course)) {
            event(new CourseDeleted($course));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.courses.delete_error'));
    }

    /**
     * @param Model $course
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $course)
    {
        if (is_null($course->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.courses.delete_first'));
        }

        DB::transaction(function () use ($course) {
            if (parent::forceDelete($course)) {
                event(new CoursePermanentlyDeleted($user));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.courses.delete_error'));
        });
    }

    /**
     * @param Model $course
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $course)
    {
        if (is_null($course->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.courses.cant_restore'));
        }

        if (parent::restore(($course))) {
            event(new CourseRestored($course));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.courses.restore_error'));
    }

    /**
     * @param Model $user
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $user, $status)
    {
        if (access()->id() == $user->id && $status == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
        }

        $user->status = $status;

        switch ($status) {
            case 0:
                event(new UserDeactivated($user));
            break;

            case 1:
                event(new UserReactivated($user));
            break;
        }

        if (parent::save($user)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.mark_error'));
    }

     

    /**
     * @param $roles
     * @param $user
     */
    protected function flushRoles($roles, $user)
    {
        //Flush roles out, then add array of new ones
        $user->detachRoles($user->roles);
        $user->attachRoles($roles['assignees_roles']);
    }

    


    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createCourseStub($input)
    {
        $course = self::MODEL;
        $course = new $course();
        $course->name = $input['name'];
        $course->description =  $input['description'];
        $course->slug =  $input['slug'];
        $course->status = isset($input['status']) ? 1 : 0;
        return $course;
    }
}
