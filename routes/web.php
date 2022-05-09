<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['middleware'=>'PrevetBackHistory'])->group(function(){
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


                             /////////////************Admin**********///////////
    Route::group(['prefix' => 'admin',  'middleware' =>['isAdmin','auth','PrevetBackHistory']], function(){
    Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changePasswordAdmin');
    Route::get('/forgetpassword', [App\Http\Controllers\HomeController::class, 'forgetpassword'])->name('forgetPasswordAdmin');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('adminDashboard');
    Route::get('departments', [App\Http\Controllers\HomeController::class, 'departments'])->name('adminDepartments');
    Route::post('/departments', [App\Http\Controllers\HomeController::class, 'savedDepartments'])->name('adminSavedDepartments');
    Route::get('edit/{department_id}', [App\Http\Controllers\HomeController::class,  'editDepartments']);
    Route::post('update/{department_id}', [App\Http\Controllers\HomeController::class, 'Updatedepartment'])->name('departmentUpdate');
    Route::get('/deleteDepartment/{id}', [App\Http\Controllers\HomeController::class, 'destroyDepartment'])->name('admindepartmentdelete');
    Route::get('levels', [App\Http\Controllers\HomeController::class, 'levels'])->name('adminLevels');
    Route::post('/levels', [App\Http\Controllers\HomeController::class, 'savedLevels'])->name('adminSavedLevels');
    Route::get('edit/level/{level_id}', [App\Http\Controllers\HomeController::class,  'editLevels']);
    Route::post('update/level/{level_id}', [App\Http\Controllers\HomeController::class, 'Updatelevel'])->name('levelUpdate');
    Route::get('/deleteLevel/{level_id}', [App\Http\Controllers\HomeController::class, 'destroyLevel'])->name('adminleveldelete');
    Route::get('/subjects', [App\Http\Controllers\HomeController::class, 'subjects'])->name('adminSubjects');
    Route::get('/pendingTeacher', [App\Http\Controllers\HomeController::class,'pendingTeacher'])->name('adminPendingTeacher');
    Route::get('/teacherSubjects', [App\Http\Controllers\HomeController::class, 'teacherSubjects'])->name('adminTeacherSubjects');
    Route::post('/teacherSubjects/save', [App\Http\Controllers\HomeController::class, 'saveTeacherSubjects']);
    Route::get('/totalTeacher', [App\Http\Controllers\HomeController::class, 'totalTeacher'])->name('adminTotalTeacher');
    Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('adminTotalTeacherdelete');
    Route::get('/totalStudents', [App\Http\Controllers\HomeController::class, 'totalStudents'])->name('adminTotalStudents');
    Route::get('/allExams', [App\Http\Controllers\HomeController::class, 'allExams'])->name('adminAllExams');
   
    
});

                     ////////////////doctor////////////////
Route::group(['prefix' => 'doctor',  'middleware' => ['isDoctor','auth','PrevetBackHistory']], function(){
    Route::get('/dashboard', [App\Http\Controllers\DoctorController::class, 'dashboard'])->name('doctorDashboard');




});

                     ////////////////student////////////////
Route::group(['prefix' => 'student',  'middleware' => ['isStudent','auth','PrevetBackHistory']], function(){                     
    Route::get('/dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('studentDashboard');

    
                    
});

Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'register_page']);
Route::post('/registerpostPage', [App\Http\Controllers\RegisterController::class, 'register']);





