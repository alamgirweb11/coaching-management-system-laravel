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

Route::post('/user-info-update',[
    'uses'=>'UserRegistrationController@userInfoUpdate',
    'as'=>'user-info-update'
]);
// change user profile photo
Route::get('/change-user-avatar/{id}',[
    'uses'=>'UserRegistrationController@changeUserAvatar',
    'as'=>'change-user-avatar'
]);

Route::post('/update-user-photo',[
    'uses'=>'UserRegistrationController@updateUserPhoto',
    'as'=>'update-user-photo'
]);

Route::get('/change-user-password/{id}',[
    'uses'=>'UserRegistrationController@changeUserPassword',
    'as'=>'change-user-password'
]);

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

Route::get('/slide-unpublished/{id}',[
    'uses'=>'SliderController@slideUnpublished',
    'as'=>'slide-unpublished'
]);

Route::get('/slide-published/{id}',[
    'uses'=>'SliderController@slidePublished',
    'as'=>'slide-published'
]);
// show upload photo in photo gellery section
Route::get('/photo-gallery',[
    'uses'=>'SliderController@photoGallery',
    'as'=>'photo-gallery'
]);

Route::get('/slide-edit/{id}',[
    'uses'=>'SliderController@slideEdit',
    'as'=>'slide-edit'
]);

Route::post('/update-silde',[
    'uses'=>'SliderController@updateSilde',
    'as'=>'update-silde'
]);

Route::get('/slide-delete/{id}',[
    'uses'=>'SliderController@slideDelete',
    'as'=>'slide-delete'
]);

// slider section end


// school management start
Route::get('/school/add',[
    'uses'=>'SchoolManagementController@addSchoolForm',
    'as'=>'add-school'
]);

Route::post('/school/save',[
    'uses'=>'SchoolManagementController@schoolSave',
    'as'=>'school-save'
]);

Route::get('/school/list',[
    'uses'=>'SchoolManagementController@schoolList',
    'as'=>'school-list'
]);
Route::get('/school/unpublished/{id}',[
    'uses'=>'SchoolManagementController@schoolUnpublished',
    'as'=>'school-unpublished'
]);

Route::get('/school/published/{id}',[
    'uses'=>'SchoolManagementController@schoolPublished',
    'as'=>'school-published'
]);

Route::get('/school/edit/{id}',[
    'uses'=>'SchoolManagementController@schoolEditForm',
    'as'=>'school-edit'
]);
Route::post('/school/update',[
    'uses'=>'SchoolManagementController@schoolUpdate',
    'as'=>'school-update'
]);

Route::get('/school/delete/{id}',[
    'uses'=>'SchoolManagementController@schoolDelete',
    'as'=>'school-delete'
]);
// school management end


// class management start
Route::get('/add/class',[
    'uses'=>'ClassManagementController@addClassForm',
    'as'=>'add-class'
]);

Route::post('/save/class',[
    'uses'=>'ClassManagementController@saveClass',
    'as'=>'save-class'
]);

Route::get('/class/list',[
    'uses'=>'ClassManagementController@classListForm',
    'as'=>'class-list'
]);

Route::get('/class/unpublished/{id}',[
    'uses'=>'ClassManagementController@classUnpublished',
    'as'=>'class-unpublished'
]);
Route::get('/class/published/{id}',[
    'uses'=>'ClassManagementController@classPublished',
    'as'=>'class-published'
]);

Route::get('/class/edit/{id}',[
    'uses'=>'ClassManagementController@classEditForm',
    'as'=>'class-edit'
]);

Route::post('/class/update',[
    'uses'=>'ClassManagementController@classUpdate',
    'as'=>'class-update'
]);

Route::get('/class/delete/{id}',[
    'uses'=>'ClassManagementController@classDelete',
    'as'=>'class-delete'
]);
// class management end


// batch management start
Route::get('/add/batch',[
    'uses'=>'BatchManagementController@addBatch',
    'as'=>'add-batch'
]);

Route::get('/class-wise-student-type',[
    'uses'=>'BatchManagementController@classWiseStudentType',
    'as'=>'class-wise-student-type'
]);

Route::post('/save/batch',[
    'uses'=>'BatchManagementController@batchSave',
    'as'=>'batch-save'
]);

Route::get('/batch/list',[
    'uses'=>'BatchManagementController@batchList',
    'as'=>'batch-list'
]);

Route::get('/batch/list-by-ajax',[
    'uses'=>'BatchManagementController@batchListByAjax',
    'as'=>'batch-list-by-ajax'
]);

Route::get('/batch/unpublished',[
    'uses'=>'BatchManagementController@batchUnpublished',
    'as'=>'batch-unpublished'
]);

Route::get('/batch/published',[
    'uses'=>'BatchManagementController@batchPublished',
    'as'=>'batch-published'
]);

Route::get('/batch/delete',[
    'uses'=>'BatchManagementController@batchDelete',
    'as'=>'batch-delete'
]);

Route::get('/batch/edit/{id}',[
    'uses'=>'BatchManagementController@batchEdit',
    'as'=>'batch-edit'
]);

Route::post('/batch/update',[
    'uses'=>'BatchManagementController@batchUpdate',
    'as'=>'batch-update'
]);

// batch management end


// student type management start
Route::get('/student-type',[
        'uses' =>'StudentTypeController@index',
        'as' =>'student-type'
]);

Route::post('/student-type-add',[
        'uses' =>'StudentTypeController@studentTypeAdd',
        'as' =>'student-type-add'
]);

Route::get('/student-type-list',[
        'uses' =>'StudentTypeController@studentTypeList',
        'as' =>'student-type-list'
]);

Route::get('/student-type-unpublish',[
        'uses' =>'StudentTypeController@studentTypeUnpublish',
        'as' =>'student-type-unpublish'
]);

Route::get('/student-type-publish',[
        'uses' =>'StudentTypeController@studentTypePublish',
        'as' =>'student-type-publish'
]);
Route::post('/student-type-update',[
        'uses' =>'StudentTypeController@studentTypeUpdate',
        'as' =>'student-type-update'
]);

Route::get('/student-type-delete',[
        'uses' =>'StudentTypeController@studentTypeDelete',
        'as' =>'student-type-delete'
]);

// student type management end
// student registration management start
Route::get('/student-registration-form',[
    'uses' =>'StudentRegistrationController@studentRegistrationForm',
    'as' =>'student-registration-form'
]);

Route::get('/bring-student-type',[
    'uses' =>'StudentRegistrationController@bringStudentType',
    'as' =>'bring-student-type'
]);

Route::get('/batch-roll-form',[
    'uses' =>'StudentRegistrationController@batchRollForm',
    'as' =>'batch-roll-form'
]);

Route::post('/student/registration-form',[
    'uses' =>'StudentRegistrationController@studentSave',
    'as' =>'student-save'
]);
Route::get('/student/all-running-student-list',[
    'uses' =>'StudentRegistrationController@allRunningStudentList',
    'as' =>'all-running-student-list'
]);
// class wise student list section
Route::get('/student/class-selection-form',[
    'uses' =>'StudentRegistrationController@classSelectionForm',
    'as' =>'class-selection-form'
]);

Route::get('/student/class-wise-student-type',[
    'uses' =>'StudentRegistrationController@classWiseStudentType',
    'as' =>'class-wise-student-type'
]);

Route::get('/student/class-and-type-wise-student',[
    'uses' =>'StudentRegistrationController@classAdnTypeWiseStudent',
    'as' =>'class-and-type-wise-student'
]);

// student profile section
Route::get('/student/profile/{id}',[
    'uses' =>'StudentRegistrationController@studentProfile',
    'as' =>'student-profile'
]);

Route::post('/student/basic-info-update',[
    'uses' =>'StudentRegistrationController@studentBasicInfoUpdate',
    'as' =>'student-basic-info-update'
]);
// batch wise student list section
Route::get('/student/batch-selection-form',[
    'uses' =>'StudentRegistrationController@batchSelectionForm',
    'as' =>'batch-selection-form'
]);

Route::get('/student/class-and-type-wise-batch-list',[
    'uses' =>'StudentRegistrationController@classAndTypeWiseBatchList',
    'as' =>'class-and-type-wise-batch-list'
]);

Route::get('/student/batch-wise-student-list',[
    'uses' =>'StudentRegistrationController@batchWiseStudentList',
    'as' =>'batch-wise-student-list'
]);

// student registration management end
});
Auth::routes(['register' => false]
);

Route::get('/home', 'HomeController@index')->name('home');
