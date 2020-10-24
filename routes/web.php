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
    // registration and login section start
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
    // registration and login section end

 // Header General Section 
 Route::get('/add-header-footer',[
        'uses'=>'HomePageController@addHeaderFooterForm',
        'as'=>'add-header-footer'
 ]);
 
 Route::post('/add-header-footer',[
        'uses'=>'HomePageController@headerAndFooterSave',
        'as'=>'header-and-footer-save'
 ]);

 Route::get('/manage-header-footer/{id}',[
        'uses'=>'HomePageController@manageHeaderFooter',
        'as'=>'manage-header-footer'
 ]);
 Route::post('/header-and-footer-update',[
        'uses'=>'HomePageController@headerAndFooterUpdate',
        'as'=>'header-and-footer-update'
 ]);
//  header general section end

// slider section start
Route::get('/add-slide',[
    'uses'=>'SliderController@addSlide',
    'as'=>'add-slide'
]);
Route::post('/upload-silde',[
    'uses'=>'SliderController@uploadSilde',
    'as'=>'upload-silde'
]);
Route::get('/manage-slide',[
    'uses'=>'SliderController@manageSlide',
    'as'=>'manage-slide'
]);
// slider unpublished route
Route::get('/slide-unpublished/{id}',[
    'uses'=>'SliderController@slideUnpublished',
    'as'=>'slide-unpublished'
]);
// slider unpublished route
Route::get('/slide-published/{id}',[
    'uses'=>'SliderController@slidePublished',
    'as'=>'slide-published'
]);
// show upload photo in photo gellery section
Route::get('/photo-gallery',[
    'uses'=>'SliderController@photoGallery',
    'as'=>'photo-gallery'
]);
// slide edit route
Route::get('/slide-edit/{id}',[
    'uses'=>'SliderController@slideEdit',
    'as'=>'slide-edit'
]);
// slide update route
Route::post('/update-silde',[
    'uses'=>'SliderController@updateSilde',
    'as'=>'update-silde'
]);
// slide delete route
Route::get('/slide-delete/{id}',[
    'uses'=>'SliderController@slideDelete',
    'as'=>'slide-delete'
]);

// slider section end

});
Auth::routes(['register' => false]
);

Route::get('/home', 'HomeController@index')->name('home');
