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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']],function(){
// call to the user-registration for register new user
    Route::get('/user-registration',[
        'uses'=>'UserRegistrationController@showRegistrationForm',
        'as'=>'user-registration'
  ]);
  // save value in user-list table
Route::post('/user-registration',[
    'uses'=>'UserRegistrationController@userSave',
    'as'=>'user-save'
]);
// show data in user table
Route::get('/user-list',[
    'uses'=>'UserRegistrationController@userList',
    'as'=>'user-list'
]);
// show specific user profile
Route::get('/user-profile/{userId}',[
    'uses'=>'UserRegistrationController@userProfile',
    'as'=>'user-profile'
]);
// Change user info 
Route::get('/change-user-info/{id}',[
    'uses'=>'UserRegistrationController@changeUserInfo',
    'as'=>'change-user-info'
]);
// user info upate and redirect 
Route::post('/user-info-update',[
    'uses'=>'UserRegistrationController@userInfoUpdate',
    'as'=>'user-info-update'
]);
// change user profile photo
Route::get('/change-user-avatar/{id}',[
    'uses'=>'UserRegistrationController@changeUserAvatar',
    'as'=>'change-user-avatar'
]);
// redirect update-user-photo page
Route::post('/update-user-photo',[
    'uses'=>'UserRegistrationController@updateUserPhoto',
    'as'=>'update-user-photo'
]);
// change user password route
Route::get('/change-user-password/{id}',[
    'uses'=>'UserRegistrationController@changeUserPassword',
    'as'=>'change-user-password'
]);
// redirect user-profile page
Route::post('/user-password-update',[
    'uses'=>'UserRegistrationController@userPasswordUpdate',
    'as'=>'user-password-update'
]);

});
Auth::routes(['register' => false]
);

Route::get('/home', 'HomeController@index')->name('home');
