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

Route::get('/', "HomeController@home");

Route::get('/register', "AuthController@showregister");
Route::post('/register', "AuthController@register");

Route::get('/login', "AuthController@showlogin");
Route::post('/login', "AuthController@login");

Route::get('/anonymous', "AuthController@anonymous");

Route::get('/logout', "AuthController@logout");

Route::get('/userinfo/{user_id}', "UserController@getinfo");

Route::get('/updatepassword', "UserController@updatepassword")->middleware('auth');
Route::post('/checkupdatepassword', "UserController@checkupdatepassword")->middleware('auth');

Route::get('/addmessage', "MessageController@addmessage")->middleware('auth');
Route::post('/checkaddmessage', "MessageController@checkaddmessage")->middleware('auth');
Route::get('/editmessage/{message_id}', "MessageController@editmessage")->middleware('auth');
Route::post('/checkeditmessage/{message_id}', "MessageController@checkeditmessage")->middleware('auth');
Route::get('/deletemessage/{message_id}', "MessageController@deletemessage")->middleware('auth');

Route::get('/addreply/{message_id}', "ReplyController@addreply")->middleware('auth');
Route::post('/checkaddreply/{message_id}', "ReplyController@checkaddreply")->middleware('auth');
Route::get('/editreply/{reply_id}', "ReplyController@editreply")->middleware('auth');
Route::post('/checkeditreply/{reply_id}', "ReplyController@checkeditreply")->middleware('auth');
Route::get('/deletereply/{reply_id}', "ReplyController@deletereply")->middleware('auth');