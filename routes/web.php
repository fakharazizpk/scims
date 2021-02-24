<?php

use Illuminate\Support\Facades\Route;

/*Admin Controller*/
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminNationalityController;
use App\Http\Controllers\AdminReligionController;
use App\Http\Controllers\AdminGenderController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AdminBloodGroupController;
use App\Http\Controllers\AdminDesignationController;
use App\Http\Controllers\AdminCastController;
use App\Http\Controllers\AdminStudentCategoryController;
use App\Http\Controllers\AdminMaritalStatusController;
use App\Http\Controllers\AdminDistrictController;
use App\Http\Controllers\AdminCityController;
use App\Http\Controllers\AdminDisabilityController;
use App\Http\Controllers\AdminClassSectionController;
use App\Http\Controllers\AdminSchoolController;
use App\Http\Controllers\AdminBoardController;
/*Other Controller*/
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
/*admin routes*/
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'AdminLoginPage']);
    Route::post('login', [AdminAuthController::class, 'AdminLogin']);
    Route::get('logout', [AdminAuthController::class, 'Logout']);


    //Route::post('login', 'UserController@ShowUserLoginPage');
    /*Route::post('logout', 'UserController@LogoutUser');
    Route::get('logout', 'UserController@LogoutUser');
    Route::get('register', 'UserController@ShowUserRegistrationPage');
    Route::post('register', 'UserController@UserResgisteration');
    Route::get('forgot-password', 'UserController@ForgotPasswordView');
    Route::post('reset_password_without_token', 'UserController@validatePasswordRequest');
    Route::post('reset_password_with_token', 'UserController@resetPassword');
    Route::get('reset_password/{id}', 'UserController@showUpdatePasswordView');
    Route::post('update_password', 'UserController@updatePassword');
    Route::get('password/reset/{token}', 'UserController@validateToken');
    Route::get('reset-password-view/{token?}{email?}', 'UserController@ShowUpdatePasswordView');
    Route::post('update-password', 'UserController@UpdatePassword');*/
    //Auth::routes();
    //Route::get('dashboard', 'DashboardController@index')->name('home');

});
Route::prefix('admin')->middleware(['validAdmin'])->group(function () {
    /*Home*/
    Route::get('home', [AdminHomeController::class, 'index']);
    /*Nationality*/
    Route::get('nationality', [AdminNationalityController::class, 'index']);
    Route::get('nationality/add-view', [AdminNationalityController::class, 'create']);
    Route::post('nationality/add', [AdminNationalityController::class, 'store']);
    Route::get('nationality/edit/{id}', [AdminNationalityController::class, 'edit']);
    Route::post('nationality/update', [AdminNationalityController::class, 'update']);
    Route::get('nationality/delete/{id}', [AdminNationalityController::class, 'delete']);
    /*Religion*/
    Route::get('religion', [AdminReligionController::class, 'index']);
    Route::get('religion/add-view', [AdminReligionController::class, 'create']);
    Route::post('religion/add', [AdminReligionController::class, 'store']);
    Route::get('religion/edit/{id}', [AdminReligionController::class, 'edit']);
    Route::post('religion/update', [AdminReligionController::class, 'update']);
    Route::get('religion/delete/{id}', [AdminReligionController::class, 'delete']);
    /*Gender*/
    Route::get('gender', [AdminGenderController::class, 'index']);
    Route::get('gender/add-view', [AdminGenderController::class, 'create']);
    Route::post('gender/add', [AdminGenderController::class, 'store']);
    Route::get('gender/edit/{id}', [AdminGenderController::class, 'edit']);
    Route::post('gender/update', [AdminGenderController::class, 'update']);
    Route::get('gender/delete/{id}', [AdminGenderController::class, 'delete']);
    /*Section*/
    Route::get('section', [AdminSectionController::class, 'index']);
    Route::get('section/add-view', [AdminSectionController::class, 'create']);
    Route::post('section/add', [AdminSectionController::class, 'store']);
    Route::get('section/edit/{id}', [AdminSectionController::class, 'edit']);
    Route::post('section/update', [AdminSectionController::class, 'update']);
    Route::get('section/delete/{id}', [AdminSectionController::class, 'delete']);
    /*Blood-Group*/
    Route::get('blood-group', [AdminBloodGroupController::class, 'index']);
    Route::get('blood-group/add-view', [AdminBloodGroupController::class, 'create']);
    Route::post('blood-group/add', [AdminBloodGroupController::class, 'store']);
    Route::get('blood-group/edit/{id}', [AdminBloodGroupController::class, 'edit']);
    Route::post('blood-group/update', [AdminBloodGroupController::class, 'update']);
    Route::get('blood-group/delete/{id}', [AdminBloodGroupController::class, 'delete']);
    /*Designation*/
    Route::get('designation', [AdminDesignationController::class, 'index']);
    Route::get('designation/add-view', [AdminDesignationController::class, 'create']);
    Route::post('designation/add', [AdminDesignationController::class, 'store']);
    Route::get('designation/edit/{id}', [AdminDesignationController::class, 'edit']);
    Route::post('designation/update', [AdminDesignationController::class, 'update']);
    Route::get('designation/delete/{id}', [AdminDesignationController::class, 'delete']);
    /*Cast*/
    Route::get('cast', [AdminCastController::class, 'index']);
    Route::get('cast/add-view', [AdminCastController::class, 'create']);
    Route::post('cast/add', [AdminCastController::class, 'store']);
    Route::get('cast/edit/{id}', [AdminCastController::class, 'edit']);
    Route::post('cast/update', [AdminCastController::class, 'update']);
    Route::get('cast/delete/{id}', [AdminCastController::class, 'delete']);

    /*student category*/
    Route::get('student/category', [AdminStudentCategoryController::class, 'index']);
    Route::get('student/category/add-view', [AdminStudentCategoryController::class, 'create']);
    Route::post('student/category/add', [AdminStudentCategoryController::class, 'store']);
    Route::get('student/category/edit/{id}', [AdminStudentCategoryController::class, 'edit']);
    Route::post('student/category/update', [AdminStudentCategoryController::class, 'update']);
    Route::get('student/category/delete/{id}', [AdminStudentCategoryController::class, 'delete']);
    /*marital status*/
    Route::get('marital-status', [AdminMaritalStatusController::class, 'index']);
    Route::get('marital-status/add-view', [AdminMaritalStatusController::class, 'create']);
    Route::post('marital-status/add', [AdminMaritalStatusController::class, 'store']);
    Route::get('marital-status/edit/{id}', [AdminMaritalStatusController::class, 'edit']);
    Route::post('marital-status/update', [AdminMaritalStatusController::class, 'update']);
    Route::get('marital-status/delete/{id}', [AdminMaritalStatusController::class, 'delete']);
    /*district*/
    Route::get('district', [AdminDistrictController::class, 'index']);
    Route::get('district/add-view', [AdminDistrictController::class, 'create']);
    Route::post('district/add', [AdminDistrictController::class, 'store']);
    Route::get('district/edit/{id}', [AdminDistrictController::class, 'edit']);
    Route::post('district/update', [AdminDistrictController::class, 'update']);
    Route::get('district/delete/{id}', [AdminDistrictController::class, 'delete']);
    /*disability*/
    Route::get('disability', [AdminDisabilityController::class, 'index']);
    Route::get('disability/add-view', [AdminDisabilityController::class, 'create']);
    Route::post('disability/add', [AdminDisabilityController::class, 'store']);
    Route::get('disability/edit/{id}', [AdminDisabilityController::class, 'edit']);
    Route::post('disability/update', [AdminDisabilityController::class, 'update']);
    Route::get('disability/delete/{id}', [AdminDisabilityController::class, 'delete']);
    /*cities*/
    Route::get('cities', [AdminCityController::class, 'index']);
    Route::get('cities/add-view', [AdminCityController::class, 'create']);
    Route::post('cities/add', [AdminCityController::class, 'store']);
    Route::get('cities/edit/{id}', [AdminCityController::class, 'edit']);
    Route::post('cities/update', [AdminCityController::class, 'update']);
    Route::get('cities/delete/{id}', [AdminCityController::class, 'delete']);
    /*Class Section*/
    Route::get('class-section', [AdminClassSectionController::class, 'index']);
    Route::get('class-section/add-view', [AdminClassSectionController::class, 'create']);
    Route::post('class-section/add', [AdminClassSectionController::class, 'store']);
    Route::get('class-section/edit/{id}', [AdminClassSectionController::class, 'edit']);
    Route::post('class-section/update', [AdminClassSectionController::class, 'update']);
    Route::get('class-section/delete/{id}', [AdminClassSectionController::class, 'delete']);
    /*school*/
    Route::get('school', [AdminSchoolController::class, 'index']);
    Route::get('school/add-view', [AdminSchoolController::class, 'create']);
    Route::post('school/add', [AdminSchoolController::class, 'store']);
    Route::get('school/edit/{id}', [AdminSchoolController::class, 'edit']);
    Route::post('school/update', [AdminSchoolController::class, 'update']);
    Route::get('school/delete/{id}', [AdminSchoolController::class, 'delete']);
    /*Board*/
    Route::get('board', [AdminBoardController::class, 'index']);
    Route::get('board/add-view', [AdminBoardController::class, 'create']);
    Route::post('board/add', [AdminBoardController::class, 'store']);
    Route::get('board/edit/{id}', [AdminBoardController::class, 'edit']);
    Route::post('board/update', [AdminBoardController::class, 'update']);
    Route::get('board/delete/{id}', [AdminBoardController::class, 'delete']);

});
/*admin Routs end */

/*login User*/
Route::get('/', [UserController::class, 'LoginPage']);
Route::get('login', [UserController::class, 'LoginPage']);
Route::post('login', [UserController::class, 'Login']);
Route::post('logout', [UserController::class, 'Logout']);


/*User*/
Route::get('users', [UserController::class, 'index']);
Route::post('add-user', [UserController::class, 'CreateUser']);
Route::get('show-user/{id}', [UserController::class, 'ShowUser']);
Route::get('edit-user/{id}', [UserController::class, 'EditUser']);
Route::post('update-user/{id}', [UserController::class, 'UpdateUser']);
Route::get('delete-user/{id}', [UserController::class, 'DeleteUser']);

Route::get('add-class', function () {
    return view('add-class');
});
Route::get('add-school', function () {
    return view('admin.add-school');
});
Route::get('add-subject', function () {
    return view('admin.add-subject');
});
Route::get('students', function () {
    return view('students');
});
Route::get('admission', function () {
    return view('admission');
});
Route::get('staff', function () {
    return view('staff');
});
Route::get('appointment', function () {
    return view('appointment');
});


Route::get('users-type', function () {
    return view('admin.add-users');
});


Route::get('home', [HomeController::class, 'index']);

/*
Route::resource('subject', SubjectController::class);*/
/*User Subject*/
Route::get('add-subject', [SubjectController::class, 'index']);
Route::post('add-subject', [SubjectController::class, 'CreateSubject']);
Route::get('show-subject/{id}', [SubjectController::class, 'ShowSubject']);
Route::get('edit-subject/{id}', [SubjectController::class, 'EditSubject']);
Route::post('update-subject/{id}', [SubjectController::class, 'UpdateSubject']);
Route::get('delete-subject/{id}', [SubjectController::class, 'DeleteSubject']);



