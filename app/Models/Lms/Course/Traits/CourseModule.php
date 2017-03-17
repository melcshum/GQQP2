<?php

namespace App\Models\Lms\Course\Traits;

/**
 * Class UserAccess.
 */
trait CourseModule
{
    /**
     * Checks if the user has a Module by its name or id.
     *
     * @param string $nameOrId Module name or id.
     *
     * @return bool
     */
    public function hasModule($nameOrId)
    {
        foreach ($this->modules as $module) {
            //See if module has all permissions
            if ($module->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($module->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($module->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of modules.
     *
     * All must return true
     *
     * @param  $modules
     * @param  $needsAll
     *
     * @return bool
     */
    public function hasModules($modules, $needsAll = false)
    {
        //If not an array, make a one item array
        if (! is_array($modules)) {
            $modules = [$modules];
        }

        //User has to possess all of the $modules specified
        if ($needsAll) {
            $hasModules = 0;
            $numModules = count($modules);

            foreach ($modules as $module) {
                if ($this->hasModule($modules)) {
                    $hasModules++;
                }
            }

            return $numModules == $hasModules;
        }

        //User has to possess one of the modules specified
        foreach ($modules as $modlue) {
            if ($this->hasModule($modlue)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if user has a permission by its name or id.
     *
     * @param string $nameOrId Permission name or id.
     *
     * @return bool
     */
    public function allow($nameOrId)
    {
        foreach ($this->modules as $module) {
            // See if module has all permissions
            if ($module->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($module->permissions as $perm) {

                // First check to see if it's an ID
                if (is_numeric($nameOrId)) {
                    if ($perm->id == $nameOrId) {
                        return true;
                    }
                }

                // Otherwise check by name
                if ($perm->name == $nameOrId) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check an array of permissions and whether or not all are required to continue.
     *
     * @param  $permissions
     * @param  $needsAll
     *
     * @return bool
     */
    public function allowMultiple($permissions, $needsAll = false)
    {
        //If not an array, make a one item array
        if (! is_array($permissions)) {
            $permissions = [$permissions];
        }

        //User has to possess all of the permissions specified
        if ($needsAll) {
            $hasPermissions = 0;
            $numPermissions = count($permissions);

            foreach ($permissions as $perm) {
                if ($this->allow($perm)) {
                    $hasPermissions++;
                }
            }

            return $numPermissions == $hasPermissions;
        }

        //User has to possess one of the permissions specified
        foreach ($permissions as $perm) {
            if ($this->allow($perm)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  $nameOrId
     *
     * @return bool
     */
    public function hasPermission($nameOrId)
    {
        return $this->allow($nameOrId);
    }

    /**
     * @param  $permissions
     * @param bool $needsAll
     *
     * @return bool
     */
    public function hasPermissions($permissions, $needsAll = false)
    {
        return $this->allowMultiple($permissions, $needsAll);
    }

    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param mixed $module
     *
     * @return void
     */
    public function attachModule($module)
    {
        if (is_object($module)) {
            $module = $module->getKey();
        }

        if (is_array($module)) {
            $module = $module['id'];
        }

        $this->modules()->attach($module);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $module
     *
     * @return void
     */
    public function detachModule($module)
    {
        if (is_object($module)) {
            $module = $module->getKey();
        }

        if (is_array($module)) {
            $module = $module['id'];
        }

        $this->modules()->detach($module);
    }

    /**
     * Attach multiple modules to a user.
     *
     * @param mixed $modules
     *
     * @return void
     */
    public function attachModules($modules)
    {
        foreach ($modules as $module) {
            $this->attachModule($module);
        }
    }

    /**
     * Detach multiple modules from a user.
     *
     * @param mixed $modules
     *
     * @return void
     */
    public function detachModules($modules)
    {
        foreach ($modules as $module) {
            $this->detachModule($module);
        }
    }
}
