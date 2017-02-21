<?php

namespace App\Http\Controllers\Lms\Model;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;

use App\Repositories\Lms\Model\ModelRepository;
use App\Http\Requests\Lms\Model\ManageModelRequest;

use App\Models\Lms\Model\Modelle;

class ModelStatusController extends Controller
{
    /**
     * @var ModelRepository
     */
    protected $models;
    /**
     * @param ModelRepository $models
     */
    public function __construct(ModelRepository $models)
    {
        $this->models = $models;
    }
    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageModelRequest $request)
    {

        //   return view('lms.model.index');
        return view('lms.model.deactivated');
    }

    /**
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageModelRequest $request)
    {
        return view('lms.model.deleted');
    }

    /**
     * @param Model $model
     * @param $status
     * @param ManageModelRequest $request
     *
     * @return mixed
     */

    public function mark(Modelle $model, $status, ManageModelRequest $request)
    {
        $this->models->mark($model, $status);
        return redirect()->route($status == 1 ? 'lms.model.index' : 'lms.model.deactivated')->withFlashSuccess(trans('alerts.lms.model.updated'));
    }
    /**
     * @param Model              $deletedModel
     * @param ManageModelRequest $request
     *
     * @return mixed
     */

    public function delete(Modelle $deletedModel, ManageModelRequest $request)
    {
        $this->models->forceDelete($deletedModel);

        return redirect()->route('lms.model.deleted')->withFlashSuccess(trans('alerts.lms.models.deleted_permanently'));
    }
    /**
     * @param Model              $restoreModel
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function restore(Modelle $restoreModel, ManageModelRequest $request)
    {
        $this->models->restore($restoreModel);
        return redirect()->route('lms.model.index')->withFlashSuccess(trans('alerts.lms.models.restored'));

    }
}
