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
Route::post('/edit', function(\Illuminate\Http\Request $request) {
    return response()->json(['message' => $request['postId']]);
})->name('edit');


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

