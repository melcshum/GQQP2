<?php

namespace App\Http\Controllers\Lms\Model;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Model\ModelRepository;
use App\Http\Requests\Lms\Model\ManageModelRequest;

class ModelTableController extends Controller
{
    /**
     * @var ModelRepository
     */
    protected $models;

    /**
     * @param ModelRepository $courses
     */
    public function __construct(ModelRepository $models)
    {
        $this->models = $models;
    }

    /**
     * @param ManageModelRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageModelRequest $request)
    {
        $data = Datatables::of($this->models->getForDataTable($request->get('status'), $request->get('trashed')  ))

            ->addColumn('actions', function ($model) {
                return $model->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
