<?php

namespace App\Providers;

use App\Models\Access\User\User;
use App\Models\Lms\Course\Course;
use App\Models\Lms\Model\Modelle;
use App\Models\Lms\Game\Game;
use App\Models\Lms\Question\Question;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider.
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Register route model bindings
         */

        /*
         * This allows us to use the Route Model Binding with SoftDeletes on
         * On a model by model basis
         */
        $this->bind('deletedUser', function ($value) {
            $user = new User();

            return User::withTrashed()->where($user->getRouteKeyName(), $value)->first();
        });


        /*
         * This allows us to use the Route Model Binding with SoftDeletes on
         * On a model by model basis
         */
        $this->bind('deletedCourse', function ($value) {
            $course = new Course();

            return Course::withTrashed()->where($course->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedModel', function ($value) {
            $model = new Modelle();

            return Modelle::withTrashed()->where($model->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedGame', function ($value) {
            $game = new Game();

            return Game::withTrashed()->where($game->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedQuestion', function ($value) {
            $question = new Question();

            return Question::withTrashed()->where($question->getRouteKeyName(), $value)->first();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace'  => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
