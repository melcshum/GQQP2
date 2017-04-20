<?php

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */

Route::get('shop', 'ItemController@index');
Route::post('shop', 'ItemController@exchangeItem');