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
    Route::group(['namespace' => 'mcQuestion'], function () {
        /*
         * For DataTables
         */
        Route::post('mcQuestion/get', 'mcQuestionTableController')->name('mcQuestion.get');

        /*
         * Question Status'
         */

        Route::get('mcQuestion/deactivated', 'mcQuestionStatusController@getDeactivated')->name('mcQuestion.deactivated');
        Route::get('mcQuestion/deleted', 'mcQuestionStatusController@getDeleted')->name('mcQuestion.deleted');

        Route::post('photo', function (){
            request()->file('avatar')->store('output');
        });

        /*
         * Question CRUD
         */

        Route::resource('mcQuestion', 'mcQuestionController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'mcQuestion/{mcQuestion}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'mcQuestionStatusController@mark')->name('mcQuestion.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Question
         */

        Route::group(['prefix' => 'mcQuestion/{deletedMcQuestion}'], function () {
            Route::get('delete', 'mcQuestionStatusController@delete')->name('mcQuestion.delete-permanently');
            Route::get('restore','mcQuestionStatusController@restore')->name('mcQuestion.restore');
        });


    });
});

/*
});
*/