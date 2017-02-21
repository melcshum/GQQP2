<?php

namespace App\Http\Controllers\Lms\Model;

use App\Models\Lms\Model\Modelle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Model\ModelRepository;
use App\Http\Requests\Lms\Model\StoreModelRequest;
use App\Http\Requests\Lms\Model\ManageModelRequest;
use App\Http\Requests\Lms\Model\UpdateModelRequest;

class ModelController extends Controller
{

    /**
     * @var ModelRepository
     */
    protected $models;

    /**
     * @param ModelRepository $models
     *
     */
    public function __construct(ModelRepository $models)
    {
        $this->models = $models;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageModelRequest $request)
    {
        return view('lms.model.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageModelRequest $request)
    {
        return view('lms.model.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreModelRequest $request)
    {
        $this->models->create(['data' => $request ]);

        return redirect()->route('lms.model.index')->withFlashSuccess(trans('alerts.lms.models.created'));
    }



    /**
     * @param User              $model
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(Modelle $model, ManageModelRequest $request)
    {
        return view('lms.model.show')
            ->withUser($model);
    }

    /**
     * @param Model              $model
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function edit(Modelle $model, ManageModelRequest $request)
    {
        return view('lms.model.edit')
            ->withModel($model);
    }

    /**
     * @param Model              $model
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function update(Modelle $model, ManageModelRequest $request)
    {
        $this->models->update($model, ['data' => $request->all() ]);

        return redirect()->route('lms.model.index')->withFlashSuccess(trans('alerts.lms.models.updated'));
    }

    /**
     * @param Model              $model
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function destroy(Modelle $model, ManageModelRequest $request)
    {
        $this->models->delete($model);

        return redirect()->route('lms.model.deleted')->withFlashSuccess(trans('alerts.lms.models.deleted'));
    }
}
