<?php

namespace App\Http\Controllers\Lms\Module;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Lms\Module\ModuleRepository;
use App\Http\Requests\Lms\Module\ManageModuleRequest;

class ModuleTableController extends Controller
{
    /**
     * @var ModuleRepository
     */
    protected $modules;

    /**
     * @param ModuleRepository $modules
     */
    public function __construct(ModuleRepository $modules)
    {
        $this->modules = $modules;
    }

    /**
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageModuleRequest $request)
    {
        $data = Datatables::of($this->modules->getForDataTable($request->get('status'), $request->get('trashed')  ))
            //        ->editColumn('confirmed', function ($module) {
            //            return $module->confirmed_label;
            //        })
            //        ->addColumn('roles', function ($user) {
            //            return $user->roles->count() ?
            //                implode('<br/>', $user->roles->pluck('name')->toArray()) :
            //                trans('labels.general.none');
            //        })
            ->addColumn('courses', function ($module) {
                return $module->courses->count() ?
                    implode('<br/>', $module->courses->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
            ->addColumn('lessons', function ($module) {
                return $module->lessons->count() ?
                    implode('<br/>', $module->lessons->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
            ->addColumn('games', function ($module) {
                return $module->games->count() ?
                    implode('<br/>', $module->games->pluck('name')->toArray()) :
                    trans('labels.general.none');
            })
            ->addColumn('actions', function ($module) {
                return $module->action_buttons;
            })
            ->withTrashed()
            ->make(true);

        return $data;

    }

}
