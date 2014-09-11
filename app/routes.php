<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

Route::post('login', ['as' => 'auth.postLogin', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'auth.getLogout', 'uses' => 'AuthController@getLogout']);
Route::post('signup', ['as' => 'auth.postSignup', 'uses' => 'AuthController@postSignup']);

Route::get('user/profile/{user_id}', ['as' => 'user.getProfile', 'uses' => 'UserController@getProfile']);
Route::post('user/profile', ['as' => 'user.postProfile', 'uses' => 'UserController@postProfile']);

//Event::listen('illuminate.query', function($query)
//{
    //var_dump($query);
//});

Route::get('user', function() {
    //return 'a list of users';
    $users = User::all();
    return View::make('users')->with('users', $users);
    //return View::make('users');
});
