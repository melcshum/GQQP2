<?php

namespace App\Http\Controllers\Lms\Module;

use App\Models\Lms\Module\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Lms\Module\ModuleRepository;
use App\Http\Requests\Lms\Module\StoreModuleRequest;
use App\Http\Requests\Lms\Module\ManageModuleRequest;
use App\Http\Requests\Lms\Module\UpdateModuleRequest;

class ModuleController extends Controller
{
    /**
     * @var ModuleRepository
     */
    protected $modules;

    /**
     * @param ModuleRepository $modules
     *
     */
    public function __construct(ModuleRepository $modules)
    {
        $this->modules = $modules;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageModuleRequest $request)
    {
        return view('lms.module.index');
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function create(ManageModuleRequest $request)
    {
        return view('lms.module.create');
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function store(StoreModuleRequest $request)
    {
        $this->modules->create(['data' => $request ]);

        return redirect()->route('lms.module.index')->withFlashSuccess(trans('alerts.lms.modules.created'));
    }



    /**
     * @param User              $module
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function show(Module $module, ManageModuleRequest $request)
    {
        return view('lms.modules.show')
            ->withUser($module);
    }

    /**
     * @param Module              $module
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */
    public function edit(Module $module, ManageModuleRequest $request)
    {
        return view('lms.module.edit')
            ->withModule($module);
    }

    /**
     * @param Module              $module
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */
    public function update(Module  $module, ManageModuleRequest $request)
    {
        $this->modules->update($module, ['data' => $request->all() ]);

        return redirect()->route('lms.module.index')->withFlashSuccess(trans('alerts.lms.modules.updated'));
    }

    /**
     * @param Module               $module
     * @param ManageModule Request $request
     *
     * @return mixed
     */
    public function destroy(Module  $module, ManageModuleRequest $request)
    {
        $this->modules->delete($module);

        return redirect()->route('lms.module.deleted')->withFlashSuccess(trans('alerts.lms.modules.deleted'));
    }
}
