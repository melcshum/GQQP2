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
 * Model Management
 */
Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
], function () {
    Route::group(['namespace' => 'Model'], function () {
        /*
         * For DataTables
         */
        Route::post('model/get', 'ModelTableController')->name('model.get');

        /*
         * Model Status'
         */

        Route::get('model/deactivated', 'ModelStatusController@getDeactivated')->name('model.deactivated');
        Route::get('model/deleted', 'ModelStatusController@getDeleted')->name('model.deleted');


        /*
         * Model CRUD
         */

        Route::resource('model', 'ModelController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'model/{model}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'ModelStatusController@mark')->name('model.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Model
         */

        Route::group(['prefix' => 'model/{deletedModel}'], function () {
            Route::get('delete', 'ModelStatusController@delete')->name('model.delete-permanently');
            Route::get('restore','ModelStatusController@restore')->name('model.restore');
        });


    });
});

/*
});
*/