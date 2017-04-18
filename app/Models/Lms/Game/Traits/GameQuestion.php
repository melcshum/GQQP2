<?php

namespace App\Models\Lms\Game\Traits;

/**
 * Class GameQuestion.
 */
trait GameQuestion
{
    /**
     * Checks if the user has a Question by its name or id.
     *
     * @param string $nameOrId Question name or id.
     *
     * @return bool
     */
    public function hasQuestion($nameOrId)
    {
        foreach ($this->questions as $question) {
            //See if question has all permissions
            if ($question->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($question->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($question->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of questions.
     *
     * All must return true
     *
     * @param  $questions
     * @param  $needsAll
     *
     * @return bool
     */
    public function hasQuestions($questions, $needsAll = false)
    {
        //If not an array, make a one item array
        if (! is_array($questions)) {
            $questions = [$questions];
        }

        //User has to possess all of the questions specified
        if ($needsAll) {
            $hasQuestions = 0;
            $numQuestions = count($questions);

            foreach ($questions as $question) {
                if ($this->hasQuestion($question)) {
                    $hasQuestions++;
                }
            }

            return $numQuestions == $hasQuestions;
        }

        //User has to possess one of the questions specified
        foreach ($questions as $question) {
            if ($this->hasQuestion($question)) {
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
        foreach ($this->questions as $question) {
            // See if question has all permissions
            if ($question->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($question->permissions as $perm) {

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
     * @param mixed $question
     *
     * @return void
     */
    public function attachQuestion($question)
    {
        if (is_object($question)) {
            $question = $question->getKey();
        }

        if (is_array($question)) {
            $question = $question['id'];
        }

        $this->questions()->attach($question);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $question
     *
     * @return void
     */
    public function detachQuestion($question)
    {
        if (is_object($question)) {
            $question = $question->getKey();
        }

        if (is_array($question)) {
            $question = $question['id'];
        }

        $this->questions()->detach($question);
    }

    /**
     * Attach multiple questions to a user.
     *
     * @param mixed $questions
     *
     * @return void
     */
    public function attachQuestions($questions)
    {
        foreach ($questions as $question) {
            $this->attachQuestion($question);
        }
    }

    /**
     * Detach multiple questions from a user.
     * Detach multiple questions from a user.
     *
     * @param mixed $questions
     *
     * @return void
     */
    public function detachQuestions($questions)
    {
        foreach ($questions as $question) {
            $this->detachQuestion($question);
        }
    }
}
