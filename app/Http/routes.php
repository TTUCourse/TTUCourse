<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::controller('users', 'UserController');
Route::get('course/{courseId}', 'CourseController@getComment');
Route::post('course/{courseId}', 'CourseController@postComment');
Route::controller('course', 'CourseController');
Route::get('comment/like/{hashedLikeId}', 'CommentController@getLike');
Route::get('comment/unlike/{hashLikeId}', 'CommentController@getUnlike');
Route::get('comment/delete/{hashedLikeId}', 'CommentController@getDelete');
?>
