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
use App\Http\Controllers\AdminEmployeeTypeController;
use App\Http\Controllers\AdminUniversityController;
use App\Http\Controllers\AdminOccupationController;
use App\Http\Controllers\AdminRelationshipController;
use App\Http\Controllers\AdminUserController;
/*Other Controller*/
use App\Http\Controllers\AddClassesController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\AddSubjectController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;

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
    /*user Type*/
    Route::get('user-type', [AdminUserController::class, 'UserType']);
    Route::get('user-type/add-view', [AdminUserController::class, 'CreateUserTypeView']);
    Route::post('user-type/add', [AdminUserController::class, 'CreateUserType']);
    Route::get('user-type/edit/{id}', [AdminUserController::class, 'EditUserType']);
    Route::post('user-type/update', [AdminUserController::class, 'UpdateUserType']);
    Route::get('user-type/delete/{id}', [AdminUserController::class, 'DeleteUserType']);
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

    /*Employee Type*/
    Route::get('employee-type', [AdminEmployeeTypeController::class, 'index']);
    Route::get('employee-type/add-view', [AdminEmployeeTypeController::class, 'create']);
    Route::post('employee-type/add', [AdminEmployeeTypeController::class, 'store']);
    Route::get('employee-type/edit/{id}', [AdminEmployeeTypeController::class, 'edit']);
    Route::post('employee-type/update', [AdminEmployeeTypeController::class, 'update']);
    Route::get('employee-type/delete/{id}', [AdminEmployeeTypeController::class, 'delete']);
    /*University*/
    Route::get('university', [AdminUniversityController::class, 'index']);
    Route::get('university/add-view', [AdminUniversityController::class, 'create']);
    Route::post('university/add', [AdminUniversityController::class, 'store']);
    Route::get('university/edit/{id}', [AdminUniversityController::class, 'edit']);
    Route::post('university/update', [AdminUniversityController::class, 'update']);
    Route::get('university/delete/{id}', [AdminUniversityController::class, 'delete']);
    /*Occupation*/
    Route::get('occupation', [AdminOccupationController::class, 'index']);
    Route::get('occupation/add-view', [AdminOccupationController::class, 'create']);
    Route::post('occupation/add', [AdminOccupationController::class, 'store']);
    Route::get('occupation/edit/{id}', [AdminOccupationController::class, 'edit']);
    Route::post('occupation/update', [AdminOccupationController::class, 'update']);
    Route::get('occupation/delete/{id}', [AdminOccupationController::class, 'delete']);
    /*Occupation*/
    Route::get('relationship', [AdminRelationshipController::class, 'index']);
    Route::get('relationship/add-view', [AdminRelationshipController::class, 'create']);
    Route::post('relationship/add', [AdminRelationshipController::class, 'store']);
    Route::get('relationship/edit/{id}', [AdminRelationshipController::class, 'edit']);
    Route::post('relationship/update', [AdminRelationshipController::class, 'update']);
    Route::get('relationship/delete/{id}', [AdminRelationshipController::class, 'delete']);

});
/*admin Routs end */

/*login User*/

    //Clear Config cache:
    Route::get('config-cache', function() {
        $exitCode = Artisan::call('config:cache');
        return '<h1>Clear Config cleared</h1>';
    });
    Route::get('cache-clear', function() {
        $exitCode = Artisan::call('cache:clear');
        return '<h1>cache:cleared</h1>';
    });
    Route::get('config-clear', function() {
        $exitCode = Artisan::call('config:clear');
        return '<h1>config:cleared</h1>';
    });
    Route::get('route-clear', function() {
        $exitCode = Artisan::call('route:clear');
        return '<h1>route:cleared</h1>';
    });
    Route::get('view-clear', function() {
        $exitCode = Artisan::call('view:clear');
        return '<h1>view:cleared</h1>';
    });

Route::get('/', [UserController::class, 'LoginPage']);
Route::get('login', [UserController::class, 'LoginPage']);
Route::post('login', [UserController::class, 'Login']);
Route::post('logout', [UserController::class, 'Logout']);


/*User*/
Route::get('users', [UserController::class, 'index']);
Route::get('profile', [UserController::class, 'ProfileView']); //admin profile
Route::get('profile-edit', [UserController::class, 'ProfileEdit']); //admin profile edit
Route::post('profile-update', [UserController::class, 'ProfileUpdate']); //admin profile Update
Route::post('add-user', [UserController::class, 'CreateUser']);
Route::get('show-user/{id}', [UserController::class, 'ShowUser']);
Route::get('edit-user/{id}', [UserController::class, 'EditUser']);
Route::post('update-user/{id}', [UserController::class, 'UpdateUser']);
Route::get('delete-user/{id}', [UserController::class, 'DeleteUser']);

/*ajax School*/
Route::get('school', [SchoolController::class, 'index']);
//Route::post('add-school', [SchoolController::class, 'CreateSubject']);
Route::get('show-school/{id}', [SchoolController::class, 'ShowSchool']);
Route::get('edit-school/{id}', [SchoolController::class, 'EditSchool']);
Route::post('update-school', [SchoolController::class, 'UpdateSchool']);
Route::get('delete-school/{id}', [SchoolController::class, 'DeleteSchool']);

/*ajax Subject*/
Route::get('add-subject', [AddSubjectController::class, 'index']);
Route::post('add-subject', [AddSubjectController::class, 'CreateSubject']);
Route::get('show-subject/{id}', [AddSubjectController::class, 'ShowSubject']);
Route::get('edit-subject/{id}', [AddSubjectController::class, 'EditSubject']);
Route::post('update-subject', [AddSubjectController::class, 'UpdateSubject']);
Route::get('delete-subject/{id}', [AddSubjectController::class, 'DeleteSubject']);
/*Subject Subject*/

/*GuardianController*/
Route::get('parent-dashboard', [GuardianController::class, 'index']);
Route::post('add-guardian', [GuardianController::class, 'store']);
Route::post('add-mother', [GuardianController::class, 'motherInfo']);
Route::get('get-guardian-father', [GuardianController::class, 'getGuardianFather']);
Route::get('get-guardian-father-image/{id}', [GuardianController::class, 'getGuardianFatherPicture']);
Route::get('get-guardian-mother-image/{id}', [GuardianController::class, 'getGuardianMotherPicture']);
Route::get('get-guardian-mother', [GuardianController::class, 'getGuardianMother']);
/*GuardianController*/

/*class class*/
Route::get('add-class', [AddClassesController::class, 'index']);
Route::post('add-class', [AddClassesController::class, 'store']);
Route::get('show-class/{id}', [AddClassesController::class, 'show']);
Route::get('edit-class/{id}', [AddClassesController::class, 'edit']);
Route::post('update-class', [AddClassesController::class, 'update']);
Route::get('delete-class/{id}', [AddClassesController::class, 'delete']);

/*class Section*/
Route::get('class-section', [ClassSectionController::class, 'index']);
Route::post('add-class-section', [ClassSectionController::class, 'create']);
Route::get('show-class-section/{id}', [ClassSectionController::class, 'show']);
Route::get('edit-class-section/{id}', [ClassSectionController::class, 'edit']);
Route::post('update-class-section', [ClassSectionController::class, 'update']);
Route::get('delete-class-section/{id}', [ClassSectionController::class, 'delete']);


/*class student*/
Route::get('get-student/{id}', [StudentController::class, 'getstudent']); /*for ajax*/
Route::get('students', [StudentController::class, 'index']);
Route::get('admission', [StudentController::class, 'create']);
Route::post('admission-info', [StudentController::class, 'admissionInfo']);
Route::get('edit-admission-info/{id}', [StudentController::class, 'EditAdmissionInfo']);
Route::post('update-admission-info', [StudentController::class, 'UpdateAdmissionInfo']);
Route::get('change-student/{id}', [StudentController::class, 'ChangeStudentStatus']);
Route::get('withdrawl-student/{id}', [StudentController::class, 'WithdrawlStudent']);
Route::post('withdrawl-student', [StudentController::class, 'WithdrawlStudentPost']);

/*Employee*/
//Route::get('get-student/{id}', [EmployeeController::class, 'getstudent']); /*for ajax*/
Route::get('staff', [EmployeeController::class, 'index']);
Route::post('employee-filter', [EmployeeController::class, 'EmployeeFilter']);
Route::get('appointment', [EmployeeController::class, 'create']);
Route::post('appointment-info', [EmployeeController::class, 'appointmentInfo']);
Route::get('edit-appointment-info/{id}', [EmployeeController::class, 'EditAppointmentInfo']);
Route::post('update-appointment-info', [EmployeeController::class, 'UpdateAppointmentInfo']);
Route::get('change-employee-status/{id}', [EmployeeController::class, 'ChangeEmployeeStatus']);

/*Teacher*/
Route::get('teacher/dashboard', [TeacherController::class, 'index']);
Route::get('teacher/profile', [TeacherController::class, 'TeacherProfile']); //teacher profile
Route::get('teacher/editProfile', [TeacherController::class, 'editProfile']); //admin profile edit
Route::post('teacher/profile-update', [TeacherController::class, 'ProfileUpdate']); //teacher profile Update
Route::get('teacher/dairy', [TeacherController::class, 'Dairy']);

/*class class*/
/*Route::get('class', [AddClassesController::class, 'index']);
Route::get('class/add', [AddClassesController::class, 'create']);
Route::post('class/create', [AddClassesController::class, 'store']);
Route::get('class/show/{id}', [AddClassesController::class, 'show']);
Route::get('class/edit/{id}', [AddClassesController::class, 'edit']);
Route::post('class/update', [AddClassesController::class, 'update']);
Route::get('class/delete/{id}', [AddClassesController::class, 'delete']);*/


/*Route::get('class-section', function () {
    return view('class-section');
});*/
/*Route::get('add-school', function () {
    return view('add-school');
});*/
/*Route::get('add-subject', function () {
    return view('add-subject');
});*/
/*Route::get('students', function () {

});
Route::get('admission', function () {
    return view('admission');
});*/
/*Route::get('staff', function () {
    return view('staff');
});*/
/*Route::get('appointment', function () {
    return view('appointment');
});*/


Route::get('users-type', function () {
    return view('add-users');
});


Route::get('home', [HomeController::class, 'index']);






