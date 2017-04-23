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
    Route::group(['namespace' => 'fillQuestion'], function () {
        /*
         * For DataTables
         */
        Route::post('fillQuestion/get', 'fillQuestionTableController')->name('fillQuestion.get');

        /*
         * Question Status'
         */

        Route::get('fillQuestion/deactivated', 'fillQuestionStatusController@getDeactivated')->name('fillQuestion.deactivated');
        Route::get('fillQuestion/deleted', 'fillQuestionStatusController@getDeleted')->name('fillQuestion.deleted');

        /*
         * Question CRUD
         */

        Route::resource('fillQuestion', 'fillQuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'fillQuestion/{fillQuestion}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'fillQuestionStatusController@mark')->name('fillQuestion.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'fillQuestion/{deletedFillQuestion}'], function () {
            Route::get('delete', 'fillQuestionStatusController@delete')->name('fillQuestion.delete-permanently');
            Route::get('restore','fillQuestionStatusController@restore')->name('fillQuestion.restore');
        });


    });
});

/*
});
*/