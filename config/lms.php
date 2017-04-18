<?php

use App\Models\Lms\Game\Game;
use App\Models\Lms\Question\Question;
use App\Models\Lms\Course\Course;
use App\Models\Lms\Module\Module;
use App\Models\Lms\Module\ModuleB;
use App\Models\Lms\Lesson\Lesson;

return [
    /*
     * Courses table used to store courses
     */
    'courses_table' => 'courses',

    
    /*
     * Configurations for the course
     */
    'courses' => [
        'default_module' => 'Course',
    ],

    'course_module_table' => 'course_module',


    /*-------------------------------------------------*/

    'modules_table'=> 'modules',

    'module' => Module::class,

    'modules' =>[
        'default_lesson' => 'Module',
        'default_game' => 'Module',
    ],

    'module_lesson_table' => 'module_lesson',
    'module_game_table'   => 'module_game',

    /*-------------------------------------------------*/

    'games_table' => 'games',

    'game' => Game::class,

    'games' => [
        'default_question' => 'Game',
    ],

    'game_question_table' => 'game_question',


    /*-------------------------------------------------*/

    'questions_table'=> 'questions',

    'question' => Question::class,

    'questions' =>[

    ],

    /*-------------------------------------------------*/

    'mcQuestions_table'=> 'mcQuestions',

    'mcQuestion' => mcQuestion::class,

    'mcQuestions' =>[

    ],

    /*-------------------------------------------------*/

    'lessons_table'=> 'lessons',

    'lesson' => Lesson::class,

    'lessons' =>[

    ],

    /*-------------------------------------------------*/

    'providers' => [
        'games' => [
            'model'  => Game::class,
        ],

        'courses' => [
             'model' => Course::class,
        ],

        'modules' => [
            'model' => Module::class,
            'modelB' => ModuleB::class,
        ],

    ],

];
