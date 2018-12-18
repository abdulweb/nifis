<?php
use App\User;
use App\Comment;
use App\Events\NewComment;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::view('/room','room')->name('room');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController');
Route::get('/subscribe', function (){
	$user	=	User::find(1);
    if($user->subscribed()){
    	dd('the user subscribed');
    }else{
    	dd('the user has not subscribe');
    }
});
