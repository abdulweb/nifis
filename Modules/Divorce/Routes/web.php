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

Route::middleware(['auth'])->group(function() {
    Route::get('/divorce', 'DivorceController@index')->name('divorce.index');
    Route::get('/divorce_wife', 'DivorceController@divorce')->name('divorce.wife');
    Route::get('/return_wife', 'DivorceController@return')->name('return.divorce');
    Route::post('/divorce_register', 'DivorceController@divorceStore')->name('divorce.register');
    Route::post('/return_divorce', 'DivorceController@returnStore')->name('divorce.return');
});
