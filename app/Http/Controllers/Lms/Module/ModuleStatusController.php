<?php

namespace App\Http\Controllers\Lms\Module;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;

use App\Repositories\Lms\Module\ModuleRepository;
use App\Http\Requests\Lms\Module\ManageModuleRequest;

use App\Models\Lms\Module\Module;

class ModuleStatusController extends Controller
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
     * @param ManageUserRequest $request
     *
     * @return mixed
     */

    public function getDeactivated(ManageModuleRequest $request)
    {
        return view('lms.module.deactivated');
    }

    /**
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageModuleRequest $request)
    {
        return view('lms.module.deleted');
    }

    /**
     * @param Module $module
     * @param $status
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */

    public function mark(Module $module, $status, ManageModuleRequest $request)
    {
        $this->modules->mark($module, $status);
        return redirect()->route($status == 1 ? 'lms.module.index' : 'lms.module.deactivated')->withFlashSuccess(trans('alerts.lms.module.updated'));
    }
    /**
     * @param Module              $deletedModule
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */

    public function delete(Module $deletedModule, ManageModuleRequest $request)
    {
        $this->modules->forceDelete($deletedModule);

        return redirect()->route('lms.module.deleted')->withFlashSuccess(trans('alerts.lms.modules.deleted_permanently'));
    }
    /**
     * @param Module              $restoreModule
     * @param ManageModuleRequest $request
     *
     * @return mixed
     */
    public function restore(Module $restoreModule, ManageModuleRequest $request)
    {
        $this->modules->restore($restoreModule);
        return redirect()->route('lms.module.index')->withFlashSuccess(trans('alerts.lms.modules.restored'));

    }
}
