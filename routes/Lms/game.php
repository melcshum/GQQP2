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
 * Game Management
 */
Route::group([
//        'middleware' => 'access.routeNeedsPermission:manage-users',
], function () {
    Route::group(['namespace' => 'Game'], function () {
        /*
         * For DataTables
         */
        Route::post('game/get', 'GameTableController')->name('game.get');

        /*
         * Game Status'
         */

        Route::get('game/deactivated', 'GameStatusController@getDeactivated')->name('game.deactivated');
        Route::get('game/deleted', 'GameStatusController@getDeleted')->name('game.deleted');


        /*
         * Game CRUD
         */

        Route::resource('game', 'GameController');

        /*
         * Specific User
         */

        Route::group(['prefix' => 'game/{game}'], function () {
            // Account
            //  Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

            // Status
            Route::get('mark/{status}', 'GameStatusController@mark')->name('game.mark')->where(['status' => '[0,1]']);

            // Password
            //  Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
            //    Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password');

            // Access
            //  Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
        });

        /*
         * Deleted Game
         */

        Route::group(['prefix' => 'game/{deletedGame}'], function () {
            Route::get('delete', 'GameStatusController@delete')->name('game.delete-permanently');
            Route::get('restore','GameStatusController@restore')->name('game.restore');
        });


    });
});

/*
});
*/