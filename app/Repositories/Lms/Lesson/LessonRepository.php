<?php

namespace App\Repositories\Lms\Lesson;

use App\Models\Lms\Lesson\Lesson;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\Lesson\LessonCreated;
use App\Events\Lms\Lesson\LessonDeleted;
use App\Events\Lms\Lesson\LessonUpdated;
use App\Events\Lms\Lesson\LessonRestored;
use App\Events\Lms\Lesson\LessonPermanentlyDeleted;
use App\Events\Lms\Lesson\LessonDeactivated;
use App\Events\Lms\Lesson\LessonReactivated;

/*
use App\Notifications\Frontend\Auth\LessonNeedsConfirmation;
*/

/**
 * Class LessonRepository.
 */
class LessonRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Lesson::class;

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
                config('lms.lessons_table').'.id',
                config('lms.lessons_table').'.name',
                config('lms.lessons_table').'.description',
     //           config('lms.lessons_table').'.level',
     //           config('lms.lessons_table').'.type',
      //          config('lms.lessons_table').'.slug',
                config('lms.status').'.status',
                config('lms.lessons_table').'.created_at',
                config('lms.lessons_table').'.updated_at',
                config('lms.lessons_table').'.deleted_at',
            ]);

        // soft deleted
        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the LessonScope trait
        return $dataTableQuery->active($status);
         
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $lesson = $this->createLessonStub($data);

        DB::transaction(function () use ($lesson, $data) {
            if (parent::save($lesson)) {

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

                event(new LessonCreated($lesson));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.lesson.create_error'));
        });
    }

    /**
     * @param Model $lesson
     * @param array $input
     */
    public function update(Model $lesson, array $input)
    {
        $data = $input['data'];
        $lesson->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($lesson, $data ) {
            if ( parent::update($lesson, $data)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
         //     parent::save($lesson);
              //  $user->confirmed = isset($data['confirmed']) ? 1 : 0;
           
 
             //   $this->checkUserRolesCount($roles);
             //   $this->flushRoles($roles, $user);

               event(new LessonUpdated($lesson));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $lesson
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $lesson)
    {
 
        if (parent::delete($lesson)) {
            event(new LessonDeleted($lesson));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.lessons.delete_error'));
    }

    /**
     * @param Model $lesson
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $lesson)
    {
        if (is_null($lesson->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.lessons.delete_first'));
        }

        DB::transaction(function () use ($lesson) {
            if (parent::forceDelete($lesson)) {
                event(new LessonPermanentlyDeleted($lesson));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.lessons.delete_error'));
        });
    }

    /**
     * @param Model $lesson
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $lesson)
    {
        if (is_null($lesson->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.lessons.cant_restore'));
        }

        if (parent::restore(($lesson))) {
            event(new LessonRestored($lesson));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.lessons.restore_error'));
    }

    /**
     * @param Model $lesson
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $lesson, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $lesson->status = $status;

        switch ($status) {
            case 0:
                event(new LessonDeactivated($lesson));
            break;

            case 1:
                event(new LessonReactivated($lesson));
            break;
        }

        if (parent::save($lesson)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.lessons.mark_error'));
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
    protected function createLessonStub($input)
    {
        $lesson = self::MODEL;
        $lesson = new $lesson();
        $lesson->name = $input['name'];
        $lesson->description =  $input['description'];
        $lesson->slug =  $input['slug'];
        $lesson->status = isset($input['status']) ? 1 : 0;
        return $lesson;
    }
}
