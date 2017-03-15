<?php

namespace App\Models\Lms\Module\Traits;

/**
 * Class UserAccess.
 */
trait ModuleGame
{
    /**
     * Checks if the user has a Game by its name or id.
     *
     * @param string $nameOrId Game name or id.
     *
     * @return bool
     */
    public function hasGame($nameOrId)
    {
        foreach ($this->games as $game) {
            //See if game has all permissions
            if ($game->all) {
                return true;
            }

            //First check to see if it's an ID
            if (is_numeric($nameOrId)) {
                if ($game->id == $nameOrId) {
                    return true;
                }
            }

            //Otherwise check by name
            if ($game->name == $nameOrId) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks to see if user has array of games.
     *
     * All must return true
     *
     * @param  $games
     * @param  $needsAll
     *
     * @return bool
     */
    public function hasGames($games, $needsAll = false)
    {
        //If not an array, make a one item array
        if (! is_array($games)) {
            $games = [$games];
        }

        //User has to possess all of the games specified
        if ($needsAll) {
            $hasGames = 0;
            $numGames = count($games);

            foreach ($games as $game) {
                if ($this->hasGame($game)) {
                    $hasGames++;
                }
            }

            return $numGames == $hasGames;
        }

        //User has to possess one of the games specified
        foreach ($games as $game) {
            if ($this->hasGame($game)) {
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
        foreach ($this->games as $game) {
            // See if game has all permissions
            if ($game->all) {
                return true;
            }

            // Validate against the Permission table
            foreach ($game->permissions as $perm) {

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
     * @param mixed $game
     *
     * @return void
     */
    public function attachGame($game)
    {
        if (is_object($game)) {
            $game = $game->getKey();
        }

        if (is_array($game)) {
            $game = $game['id'];
        }

        $this->games()->attach($game);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param mixed $game
     *
     * @return void
     */
    public function detachGame($game)
    {
        if (is_object($game)) {
            $game = $game->getKey();
        }

        if (is_array($game)) {
            $game = $game['id'];
        }

        $this->games()->detach($game);
    }

    /**
     * Attach multiple games to a user.
     *
     * @param mixed $games
     *
     * @return void
     */
    public function attachGames($games)
    {
        foreach ($games as $game) {
            $this->attachGame($game);
        }
    }

    /**
     * Detach multiple games from a user.
     *
     * @param mixed $games
     *
     * @return void
     */
    public function detachGames($games)
    {
        foreach ($games as $game) {
            $this->detachGame($game);
        }
    }
}
