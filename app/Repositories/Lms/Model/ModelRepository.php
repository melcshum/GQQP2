<?php

namespace App\Repositories\Lms\Model;

use App\Models\Lms\Model\Modelle;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

use App\Events\Lms\Model\ModelCreated;
use App\Events\Lms\Model\ModelDeleted;
use App\Events\Lms\Model\ModelUpdated;
use App\Events\Lms\Model\ModelRestored;
use App\Events\Lms\Model\ModelPermanentlyDeleted;
use App\Events\Lms\Model\ModelDeactivated;
use App\Events\Lms\Model\ModelReactivated;


/**
 * Class ModelRepository.
 */
class ModelRepository extends Repository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Modelle::class;

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
                config('lms.modelles_table').'.id',
                config('lms.modelles_table').'.name',
                config('lms.modelles_table').'.description',
                config('lms.status').'.status',
                config('lms.modelles_table').'.created_at',
                config('lms.modelles_table').'.updated_at',
                config('lms.modelles_table').'.deleted_at',
            ]);

        // soft deleted
        if ($trashed == 'true') {
            return $dataTableQuery->onlyTrashed();
        }

        // active() is a scope on the ModelScope trait
        return $dataTableQuery->active($status);
         
    }

    /**
     * @param Model $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $model = $this->createModelStub($data);

        DB::transaction(function () use ($model, $data) {
            if (parent::save($model)) {

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

                event(new ModelCreated($model));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.model.create_error'));
        });
    }

    /**
     * @param Model $model
     * @param array $input
     */
    public function update(Model $model, array $input)
    {
        $data = $input['data']; 
        $model->status = isset($data['status']) ? 1 : 0;
 
        DB::transaction(function () use ($model, $data ) {
            if ( parent::update($model, $data)) {

               event(new ModelUpdated($model));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.access.users.update_error'));
        });
    }

     
    /**
     * @param Model $model
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $model)
    {
 
        if (parent::delete($model)) {
            event(new ModelDeleted($model));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.models.delete_error'));
    }

    /**
     * @param Model $model
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $model)
    {
        if (is_null($model->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.models.delete_first'));
        }

        DB::transaction(function () use ($model) {
            if (parent::forceDelete($model)) {
                event(new ModelPermanentlyDeleted($model));

                return true;
            }

            throw new GeneralException(trans('exceptions.lms.models.delete_error'));
        });
    }

    /**
     * @param Model $model
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $model)
    {
        if (is_null($model->deleted_at)) {
            throw new GeneralException(trans('exceptions.lms.models.cant_restore'));
        }

        if (parent::restore(($model))) {
            event(new ModelRestored($model));

            return true;
        }

        throw new GeneralException(trans('exceptions.lms.models.restore_error'));
    }

    /**
     * @param Model $model
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $model, $status)
    {
//        if (access()->id() == $user->id && $status == 0) {
//            throw new GeneralException(trans('exceptions.backend.access.users.cant_deactivate_self'));
//        }

        $model->status = $status;

        switch ($status) {
            case 0:
                event(new ModelDeactivated($model));
            break;

            case 1:
                event(new ModelReactivated($model));
            break;
        }

        if (parent::save($model)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.lms.models.mark_error'));
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
    protected function createModelStub($input)
    {
        $model = self::MODEL;
        $model = new $model();
        $model->name = $input['name'];
        $model->description =  $input['description'];
        $model->slug =  $input['slug'];
        $model->status = isset($input['status']) ? 1 : 0;
        return $model;
    }
}
