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
     * Course Management
     */
    Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
    ], function () {
        Route::group(['namespace' => 'Course'], function () {
            /*
             * For DataTables
             */
             Route::post('course/get', 'CourseTableController')->name('course.get');

            /*
             * Course Status'
             */
            
            Route::get('course/deactivated', 'CourseStatusController@getDeactivated')->name('course.deactivated');
             Route::get('course/deleted', 'CourseStatusController@getDeleted')->name('course.deleted');
            
            
            /*
             * Course CRUD
             */
            
            Route::resource('course', 'CourseController');
            
            /*
             * Specific User
             */
            
            Route::group(['prefix' => 'course/{course}'], function () {
                // Account
              //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                // Status
            //    Route::get('mark/{status}', 'UserStatusController@mark')->name('user.mark')->where(['status' => '[0,1]']);

                // Password
              //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

                // Access
              //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
            });
            
            /*
             * Deleted Course
             */
         
            Route::group(['prefix' => 'course/{deletedCourse}'], function () {
                Route::get('delete', 'CourseStatusController@delete')->name('course.delete-permanently');
                Route::get('restore','CourseStatusController@restore')->name('course.restore');  
            });
            
          
        });
    });

/*    
});
*/