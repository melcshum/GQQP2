<?php

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */

Route::resource('shop', 'ShopController');
Route::get('shop', 'ShopController@index')->name('shop.index');
Route::post('shop', 'ShopController@exchangeItem');