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


    Route::get('/profile', 'UserController@index', function($username){
        $user = User::where('name', $username)->firstOrFail();

        return View::make('profile')->with('user', $user);
    });

    Route::get('/config', 'ConfigController@index');

    Route::get('/changeInfor', 'UserController@changeInfor');
    Route::post('/updateInfor', 'UserController@updateInfor');

    Route::get('/question', 'QuestionController@index');
    Route::get('/searchQuestion', 'QuestionController@search');

    Route::get('/playMenu', function () {
        return view('menu');

    });
    Route::resource('gameTest','TestController');
    Route::post('gameTest', 'TestController@result');

    Route::resource('ifTutorialQuestion','TutorialController');
    Route::post('ifTutorialQuestion', 'TutorialController@show');

    Route::resource('challenge','ChallengeController');
    Route::post('challenge','ChallengeController@challenge');

    Route::resource('challengeFill','ChallengeFillController');
    Route::post('challengeFill','ChallengeFillController@challenge');

    Route::get('/ranking', 'UserController@rank');

    Route::get('/goal', function(){
        return view('goal');
    });

    Route::get('/why', function(){
        return view('why');
    });

    Route::get('/ranking', 'UserController@rank');

    //Route::get('/gameTest', function () {
    //    return view('gameTest');
    //});

    Route::get('/rules', function () {
        return view('rules');
    });

    //Route::get('/challenge', function () {
    //    return view('challenge');
    //});
    Route::get('/skipQuestion', function () {
        return view('skipQuestion');
    });
    Route::get('/questionResult', function () {
        return view('questionResult');
    });

    Route::get('/mcQuestion', function () {
        return view('mcQuestion');
    });

    Route::get('/mcResult', function () {
        return view('mcResult');
    });

    Route::get('/question20', function () {
        return view('question20');
    });

    Route::get('/lastQuestion', function () {
        return view('lastQuestion');
    });

    Route::post('Result', 'TestController@finish');

    Route::get('/tutorial/conditional', function () {
        return view('ifTutorual');
    });

    Route::get('/ranking', 'UserController@rank');

    Route::get('/tutorial', function(){
        return view('tutorialMenu');
    });

    Route::get('/tutorial/array', function(){
        return view('arrayTutorial');
    });

    Route::get('/tutorial/loop', function(){
        return view('loopTutorial');
    });


    Route::get('/shop', 'ItemController@index')->name('index');
    Route::post('/shop', 'ItemController@exchangeItem');


    Route::get('/goal', function(){
       return view('goal');
    });

    Route::get('/why', function(){
        return view('why');
    });



