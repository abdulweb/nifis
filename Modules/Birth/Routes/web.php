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

Route::prefix('birth/')->middleware(['auth'])->group(function() {
    Route::get('/', 'BirthController@index')->name('birth.index');
    Route::post('/register','BirthController@store')->name('birth.register');
    Route::post('/verify','BirthController@verify')->name('birth.verify');
});
