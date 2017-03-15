<?php

namespace App\Repositories\Lms\Module;

use App\Models\Lms\Module\Module;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;


use App\Events\Lms\Module\ModuleCreated;
use App\Events\Lms\Module\ModuleDeleted;
use App\Events\Lms\Module\ModuleUpdated;
use App\Events\Lms\Module\ModuleRestored;
use App\Events\Lms\Module\ModulePermanentlyDeleted;
use App\Events\Lms\Module\ModuleDeactivated;
use App\Events\Lms\Module\ModuleReactivated;

/*
use App\Notifications\Frontend\Auth\ModuleNeedsConfirmation;
*/

/**
 * Class ModuleRepository.
 */
class ModuleRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Module::class;

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
                config('lms.modules_table').'.id',
                config('lms.modules_table').'.name',
                config('lms.modules_table').'.description',
     //           config('lms.modules_table').'.level',
     //           config('lms.modules_table').'.type',
      //          config('lms.modules_table').'.slug',
                config('lms.status').'.status',
                config('lms.modules_table').'.created_at',
                config('lms.modules_table').'.updated_at',
                config('lms.modules_table').'.deleted_at',
            ]);

        // soft deleted
        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the ModuleScope trait
        return $dataTableQuery->active($status);
         
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $module = $this->createModuleStub($data);

        DB::transaction(function () use ($module, $data) {
            if (parent::save($module)) {

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

                event(new ModuleCreated($module));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.module.create_error'));
        });
    }

    /**
     * @param Model $module
     * @param array $input
     */
    public function update(Model $module, array $input)
    {
        $data = $input['data'];
        $module->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($module, $data ) {
            if ( parent::update($module, $data)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
         //     parent::save($module);
              //  $user->confirmed = isset($data['confirmed']) ? 1 : 0;
           
 
             //   $this->checkUserRolesCount($roles);
             //   $this->flushRoles($roles, $user);

               event(new ModuleUpdated($module));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $module
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $module)
    {
 
        if (parent::delete($module)) {
            event(new ModuleDeleted($module));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.modules.delete_error'));
    }

    /**
     * @param Model $module
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $module)
    {
        if (is_null($module->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.modules.delete_first'));
        }

        DB::transaction(function () use ($module) {
            if (parent::forceDelete($module)) {
                event(new ModulePermanentlyDeleted($module));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.modules.delete_error'));
        });
    }

    /**
     * @param Model $module
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $module)
    {
        if (is_null($module->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.modules.cant_restore'));
        }

        if (parent::restore(($module))) {
            event(new ModuleRestored($module));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.modules.restore_error'));
    }

    /**
     * @param Model $module
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $module, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $module->status = $status;

        switch ($status) {
            case 0:
                event(new ModuleDeactivated($module));
            break;

            case 1:
                event(new ModuleReactivated($module));
            break;
        }

        if (parent::save($module)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.modules.mark_error'));
    }

     

    /**
     * @param $roles
     * @param $user
     */
    protected function flushLessons($lessons, $module)
    {
        //Flush roles out, then add array of new ones
        $module->detachLessons($module->lessons);
        $module->attachLessons($lessons['assignees_lessons']);
    }

    protected function flushGames($games, $module)
    {
        //Flush roles out, then add array of new ones
        $module->detachLessons($module->lessons);
        $module->attachLessons($games['assignees_games']);
    }


    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createModuleStub($input)
    {
        $module = self::MODEL;
        $module = new $module();
        $module->name = $input['name'];
        $module->description =  $input['description'];
        $module->slug =  $input['slug'];
        $module->status = isset($input['status']) ? 1 : 0;
        return $module;
    }

    public function getDefaultCourseModule()
    {
        if (is_numeric(config('lms.course.default_module'))) {
            return $this->query()->where('id', (int) config('lms.courses.default_module'))->first();
        }

        return $this->query()->where('name', config('lms.courses.default_module'))->first();
    }
}
