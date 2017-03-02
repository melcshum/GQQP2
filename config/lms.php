<?php

use App\Models\Lms\Game\Game;
use App\Models\Lms\Question\Question;

return [
    /*
     * Courses table used to store courses
     */
    'courses_table' => 'courses',

    
    /*
     * Configurations for the course
     */
    'courses' => [
            ],
    'questions_table'=> 'questions',

    'question' => Question::class,

    'questions' =>[

    ],

    'modules_table'=> 'modules',

    'modules' =>[

    ],

    'games_table' => 'games',

    'games' => [
        'default_question' => 'Game',
    ],

    'game_question_table' => 'game_question',

    'providers' => [
        'games' => [
            'model'  => Game::class,
        ],

    ],

];
