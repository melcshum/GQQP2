<?php

namespace App\Models\Lms\Module\Traits;

/**
 * Class UserAccess.
 */
trait ModuleLesson
{
    /**
     * Checks if the user has a Lesson by its name or id.
     *
     * @param string $nameOrId Lesson name or id.
     *
     * @return bool
     */
    public function hasLesson($nameOrId)
    {
        foreach ($this->lessons as $lesson) {
            //See if lesson has all permissions
            if ($lesson->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($lesson->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($lesson->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of lessons.
     *
     * All must return true
     *
     * @param  $lessons
     * @param  $needsAll
     *
     * @return bool
     */
    public function hasLessons($lessons, $needsAll = false)
    {
        //If not an array, make a one item array
        if (! is_array($lessons)) {
            $lessons = [$lessons];
        }

        //User has to possess all of the $lessons specified
        if ($needsAll) {
            $hasLessons = 0;
            $numLessons = count($lessons);

            foreach ($lessons as $lesson) {
                if ($this->hasLesson($lesson)) {
                    $hasLessons++;
                }
            }

            return $numLessons == $hasLessons;
        }

        //User has to possess one of the lessons specified
        foreach ($lessons as $lesson) {
            if ($this->hasLesson($lesson)) {
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
        foreach ($this->lessons as $lesson) {
            // See if lesson has all permissions
            if ($lesson->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($lesson->permissions as $perm) {

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
     * @param mixed $lesson
     *
     * @return void
     */
    public function attachLesson($lesson)
    {
        if (is_object($lesson)) {
            $lesson = $lesson->getKey();
        }

        if (is_array($lesson)) {
            $lesson = $lesson['id'];
        }

        $this->lessons()->attach($lesson);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $lesson
     *
     * @return void
     */
    public function detachLesson($lesson)
    {
        if (is_object($lesson)) {
            $lesson = $lesson->getKey();
        }

        if (is_array($lesson)) {
            $lesson = $lesson['id'];
        }

        $this->lessons()->detach($lesson);
    }

    /**
     * Attach multiple lessons to a user.
     *
     * @param mixed $lessons
     *
     * @return void
     */
    public function attachLessons($lessons)
    {
        foreach ($lessons as $lesson) {
            $this->attachLesson($lesson);
        }
    }

    /**
     * Detach multiple lessons from a user.
     *
     * @param mixed $lessons
     *
     * @return void
     */
    public function detachLessons($lessons)
    {
        foreach ($lessons as $lesson) {
            $this->detachLesson($lesson);
        }
    }
}
