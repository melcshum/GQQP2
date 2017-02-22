<?php

/**
 * All route names are prefixed with 'lms.lms'.
 */
/*
Route::group([
    'prefix'     => 'lms',
    'as'         => 'lms.',
    'namespace'  => 'Lms',
], function () {
*/
/*
 * Question Management
 */
Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
], function () {
    Route::group(['namespace' => 'Question'], function () {
        /*
         * For DataTables
         */
        Route::post('question/get', 'QuestionTableController')->name('question.get');

        /*
         * Question Status'
         */

        Route::get('question/deactivated', 'QuestionStatusController@getDeactivated')->name('question.deactivated');
        Route::get('question/deleted', 'QuestionStatusController@getDeleted')->name('question.deleted');


        /*
         * Question CRUD
         */

        Route::resource('question', 'QuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'question/{question}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'QuestionStatusController@mark')->name('question.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'question/{deletedQuestion}'], function () {
            Route::get('delete', 'QuestionStatusController@delete')->name('question.delete-permanently');
            Route::get('restore','QuestionStatusController@restore')->name('question.restore');
        });


    });
});

/*
});
*/