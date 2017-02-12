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

Route::group(['middleware' => ['web']], function() {
    
});

Route::get('/', function () {
        return view('welcome');
});
Route::post('/signup', [
    'uses' => 'UserController@postSignUp', //uses key, the controller that we are using
    'as' =>'signup'  // give route a name to make it identificable accross the application
]);
Route::post('signin', [
   'uses' => 'UserController@postSignIn',
   'as' => 'signin'
]);
Route::get('/dashboard', [
    'uses' => 'UserController@getDashboard',
    'as' => 'dashboard'
]);