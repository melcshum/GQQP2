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
    Route::group(['namespace' => 'iftutorialQuestion'], function () {
        /*
         * For DataTables
         */
        Route::post('iftutorialQuestion/get', 'iftutorialQuestionTableController')->name('iftutorialQuestion.get');

        /*
         * Question Status'
         */

        Route::get('iftutorialQuestion/deactivated', 'iftutorialQuestionStatusController@getDeactivated')->name('iftutorialQuestion.deactivated');
        Route::get('iftutorialQuestion/deleted', 'iftutorialQuestionStatusController@getDeleted')->name('iftutorialQuestion.deleted');

        /*
         * Question CRUD
         */

        Route::resource('iftutorialQuestion', 'iftutorialQuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'iftutorialQuestion/{iftutorialQuestion}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'iftutorialQuestionStatusController@mark')->name('iftutorialQuestion.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'iftutorialQuestion/{deletediftutorialQuestion}'], function () {
            Route::get('delete', 'iftutorialQuestionStatusController@delete')->name('iftutorialQuestion.delete-permanently');
            Route::get('restore','iftutorialQuestionStatusController@restore')->name('iftutorialQuestion.restore');
        });


    });
});

/*
});
*/