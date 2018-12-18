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

   Route::get('/sms','SubscriptionController@sms')->name('sms-subs');
   Route::get('/slack','SubscriptionController@slack')->name('slack-subs');
   Route::get('/email','SubscriptionController@email')->name('email-subs');
   Route::get('/Subscription','SubscriptionController@subscription')->name('join-subs');
   Route::post('/Subscribe','SubscriptionController@subscribe')->name('subscribe');

Route::resource('/posts', 'PostController');
Route::group(['middleware'=>'auth'], function(){
   
});
Route::get('/subscribe', function (){
});
