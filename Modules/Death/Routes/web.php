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

Route::prefix('death')->middleware(['auth'])->group(function() {
    Route::get('/', 'DeathController@index')->name('death.index');
    Route::post('/verify', 'DeathController@verify')->name('death.family');
    Route::post('/register', 'DeathController@store')->name('death.register');
});
