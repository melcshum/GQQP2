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
 * Module Management
 */
Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
], function () {
    Route::group(['namespace' => 'Module'], function () {
        /*
         * For DataTables
         */
        Route::post('module/get', 'ModuleTableController')->name('module.get');

        /*
         * Module Status'
         */

        Route::get('module/deactivated', 'ModuleStatusController@getDeactivated')->name('module.deactivated');
        Route::get('module/deleted', 'ModuleStatusController@getDeleted')->name('module.deleted');


        /*
         * Module CRUD
         */

        Route::resource('module', 'ModuleController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'module/{module}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'ModuleStatusController@mark')->name('module.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Module
         */

        Route::group(['prefix' => 'module/{deletedModule}'], function () {
            Route::get('delete', 'ModuleStatusController@delete')->name('module.delete-permanently');
            Route::get('restore','ModuleStatusController@restore')->name('module.restore');
        });


    });
});

/*
});
*/