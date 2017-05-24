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
Route::get('/editmessage', "MessageController@showeditmessage")->middleware('auth');
Route::post('/editmessage', "MessageController@editmessage")->middleware('auth');
Route::post('/checkeditmessage', "MessageController@checkeditmessage")->middleware('auth');
Route::delete('/deletemessage', "MessageController@deletemessage")->middleware('auth');

Route::post('/addreply', "ReplyController@addreply")->middleware('auth');
Route::post('/checkaddreply', "ReplyController@checkaddreply")->middleware('auth');
Route::post('/editreply', "ReplyController@editreply")->middleware('auth');
Route::post('/checkeditreply', "ReplyController@checkeditreply")->middleware('auth');
Route::delete('/deletereply', "ReplyController@deletereply")->middleware('auth');