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
    Route::group(['namespace' => 'arrayQuestion'], function () {
        /*
         * For DataTables
         */
        Route::post('arrayQuestion/get', 'arrayQuestionTableController')->name('arrayQuestion.get');

        /*
         * Question Status'
         */

        Route::get('arrayQuestion/deactivated', 'arrayQuestionStatusController@getDeactivated')->name('arrayQuestion.deactivated');
        Route::get('arrayQuestion/deleted', 'arrayQuestionStatusController@getDeleted')->name('arrayQuestion.deleted');

        /*
         * Question CRUD
         */

        Route::resource('arrayQuestion', 'arrayQuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'arrayQuestion/{arrayQuestion}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'arrayQuestionStatusController@mark')->name('arrayQuestion.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'arrayQuestion/{deletedarrayQuestion}'], function () {
            Route::get('delete', 'arrayQuestionStatusController@delete')->name('arrayQuestion.delete-permanently');
            Route::get('restore','arrayQuestionStatusController@restore')->name('arrayQuestion.restore');
        });


    });
});

/*
});
*/