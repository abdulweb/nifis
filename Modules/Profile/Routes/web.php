<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('profile')->middleware(['auth','hasFamily','web'])->group(function() {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::get('setting', 'ProfileController@setting')->name('profile.setting');
    Route::get('details', 'ProfileController@userDetail')->name('user.detail');
});
