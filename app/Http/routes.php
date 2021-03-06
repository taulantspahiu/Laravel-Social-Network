<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('/signup', [
    'uses' => 'UserController@postSignUp', //uses key, the controller that we are using
    'as' =>'signup'  // give route a name to make it identificable accross the application
]);
Route::post('/signin', [
   'uses' => 'UserController@postSignIn',
   'as' => 'signin'
]);
Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);
Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);   
Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);
Route::get('/postdelete/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);
Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'post.edit'
]);
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'post.like',
]);
Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);
Route::get('/userimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);
Route::post('/updatesave', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);


/*Views*/
Route::get('/sign-up', 'PageController@signup');
Route::get('/sign-in', 'PageController@login');

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

