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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/signUp', [
	'uses'=>'UserController@postSignUp',
	'as'=>'signUp' 
]);

Route::post('/signIn', [
	'uses'=>'UserController@postSignIn',
	'as'=>'signIn' 
]);

Route::post('/createPost', [
	'uses'=>'PostController@postCreatePost',
	'as'=>'createPost' 
]);

Route::get('/dashboard', [
	'uses'=>'PostController@getDashboard',
	'as'=>'dashboard',
	'middleware' => 'auth' 
]);

Route::get('/postDelete/{post_id}', [          // post_id has to match with both the post_id from view and controller method
	'uses'=>'PostController@getDeletePost',
	'as'=>'postDelete',
	'middleware' => 'auth' 
]);

Route::get('/logOut', [
	'uses'=>'UserController@getLogOut',
	'as'=>'logOut',
	'middleware' => 'auth' 
]);

Route::get('/guest', [
	'uses'=>'UserController@guestIn',
	'as'=>'guest' 
]);

//Route::get('/login', [
//	'uses'=>'UserController@guestIn',
//	'as'=>'login' 
//]);
