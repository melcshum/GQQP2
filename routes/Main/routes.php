<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'auth', 'as' => 'auth.'], function () {

    Route::get('/profile', 'UserController@index', function($username){
        $user = User::where('name', $username)->firstOrFail();

        return View::make('main.user.profile')->with('user', $user);
    });

    Route::get('/config', 'ConfigController@index');

    Route::get('/changeInfor', 'UserController@changeInfor');
    Route::post('/updateInfor', 'UserController@updateInfor');

    Route::get('/question', 'QuestionController@index');
    Route::get('/searchQuestion', 'QuestionController@search');

    Route::get('/playMenu', function () {
        return view('main.game.menu');

    });

    Route::resource('gameTest','TestController');
    Route::post('gameTest', 'TestController@result');

    Route::resource('ifTutorialQuestion','TutorialController');
    Route::post('ifTutorialQuestion', 'TutorialController@show');

    Route::resource('arrayTutorialQuestion','ArrayTutorialController');
    Route::post('arrayTutorialQuestion', 'ArrayTutorialController@show');

    Route::resource('loopTutorialQuestion','LoopTutorialController');
    Route::post('loopTutorialQuestion', 'LoopTutorialController@show');

    Route::resource('challenge','ChallengeController');
    Route::post('challenge','ChallengeController@challenge');

    Route::resource('challengeFill','ChallengeFillController');
    Route::post('challengeFill','ChallengeFillController@challenge');

    Route::get('/ranking', 'UserController@rank');

    Route::get('/rules', function () {
        return view('main.challenge.rules');
    });

    Route::resource('challengeMCChange','ChallengeController@checkAjax');
    Route::post('challengeMCChange', 'ChallengeController@checkAjax');


    Route::resource('challengeMCChangeExtra','ChallengeController@UpdateExtraNum');
    Route::post('challengeMCChangeExtra', 'ChallengeController@UpdateExtraNum');

//    Route::get('/challenge', function () {
//        return view('main.challenge.challenge');
//    });
//    Route::get('/skipQuestion', function () {
//        return view('main.challenge.skipQuestion');
//    });
    Route::get('/questionResult', function () {
        return view('main.challenge.questionResult');
    });
//
//    Route::get('/mcQuestion', function () {
//        return view('main.challenge.mcQuestion');
//    });
//
//    Route::get('/mcResult', function () {
//        return view('main.game.mcResult');
//    });

//    Route::get('/question20', function () {
//        return view('main.challenge.question20');
//    });

//    Route::get('/lastQuestion', function () {
//        return view('main.challenge.lastQuestion');
//    });

    Route::post('Result', 'TestController@finish');

    Route::get('/tutorial/conditional', function () {
        return view('main.tutorial.ifTutorual');
    });

    Route::get('/tutorial', function(){
        return view('main.tutorial.tutorialMenu');
    });

    Route::get('/tutorial/array', function(){
        return view('main.tutorial.arrayTutorial');
    });

    Route::get('/tutorial/loop', function(){
        return view('main.tutorial.loopTutorial');
    });

});


