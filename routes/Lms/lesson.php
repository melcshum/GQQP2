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
     * Lesson Management
     */
    Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
    ], function () {
        Route::group(['namespace' => 'Lesson'], function () {
            /*
             * For DataTables
             */
             Route::post('lesson/get', 'LessonTableController')->name('lesson.get');

            /*
             * Lesson Status'
             */

            Route::get('lesson/deactivated', 'LessonStatusController@getDeactivated')->name('lesson.deactivated');
             Route::get('lesson/deleted', 'LessonStatusController@getDeleted')->name('lesson.deleted');


            /*
             * Lesson CRUD
             */

            Route::resource('lesson', 'LessonController');

            /*
             * Specific User
             */

            Route::group(['prefix' => 'lesson/{lesson}'], function () {
                // Account
              //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                // Status
                Route::get('mark/{status}', 'LessonStatusController@mark')->name('lesson.mark')->where(['status' => '[0,1]']);

                // Password
              //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

                // Access
              //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
            });

            /*
             * Deleted Lesson
             */

            Route::group(['prefix' => 'lesson/{deletedLesson}'], function () {
                Route::get('delete', 'LessonStatusController@delete')->name('lesson.delete-permanently');
                Route::get('restore','LessonStatusController@restore')->name('lesson.restore');
            });


        });
    });

/*    
});
*/