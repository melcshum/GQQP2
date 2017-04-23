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
    Route::group(['namespace' => 'loopQuestion'], function () {
        /*
         * For DataTables
         */
        Route::post('loopQuestion/get', 'loopQuestionTableController')->name('loopQuestion.get');

        /*
         * Question Status'
         */

        Route::get('loopQuestion/deactivated', 'loopQuestionStatusController@getDeactivated')->name('loopQuestion.deactivated');
        Route::get('loopQuestion/deleted', 'loopQuestionStatusController@getDeleted')->name('loopQuestion.deleted');

        /*
         * Question CRUD
         */

        Route::resource('loopQuestion', 'loopQuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'loopQuestion/{loopQuestion}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'loopQuestionStatusController@mark')->name('loopQuestion.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'loopQuestion/{deletedLoopQuestion}'], function () {
            Route::get('delete', 'loopQuestionStatusController@delete')->name('loopQuestion.delete-permanently');
            Route::get('restore','loopQuestionStatusController@restore')->name('loopQuestion.restore');
        });


    });
});

/*
});
*/