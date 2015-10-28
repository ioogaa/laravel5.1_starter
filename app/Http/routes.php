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

// Route::get('/home', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('auth/login');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('forgotPassword', 'Auth\PasswordController@getEmail');
Route::post('forgotPassword', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'role:admin'], function () {
  Route::get('user/create', [
      'uses' => 'UserController@create'
  ]);

  Route::post('user/store', [
      'uses' => 'UserController@store'
  ]);

  Route::get('user/{role?}', [
      'uses' => 'UserController@index'
  ]);

  Route::get('user/delete/{id}', [
      'uses' => 'UserController@destroy'
  ]);
});


//Protecting Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [
        'uses' => 'UserController@showProfile'
    ]);

    Route::get('changePassword', [
        'uses' => 'UserController@getChangePassword'
    ]);

    Route::post('changePassword', [
        'uses' => 'UserController@postChangePassword'
    ]);

    Route::get('user/detail/{id}', [
        'uses' => 'UserController@show'
    ]);

    Route::post('user/edit/{id}', [
        'uses' => 'UserController@edit'
    ]);

    Route::get('home', [
        'uses' => 'HomeController@index'
    ]);
});
