<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Route::middleware(['middleware' => 'PrevetBackHistory'])->group(function () {
    Auth::routes();
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('logout',[App\Http\Controllers\LoginController::class])
//Route::get('logout',['as'=>'logout','uses'=>'Auth\LoginController@logout']);


/////////////Admin///////////
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PrevetBackHistory',]], function () {
    Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changePasswordAdmin');
    Route::get('/forgetpassword', [App\Http\Controllers\HomeController::class, 'forgetpassword'])->name('forgetPasswordAdmin');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('adminDashboard');
    Route::get('departments', [App\Http\Controllers\HomeController::class, 'departments'])->name('adminDepartments');
    Route::get('/subjects', [App\Http\Controllers\HomeController::class, 'subjects'])->name('adminSubjects');
    Route::get('/pendingTeacher', [App\Http\Controllers\HomeController::class, 'pendingTeacher'])->name('adminPendingTeacher');
    Route::get('/teacherSubjects', [App\Http\Controllers\HomeController::class, 'teacherSubjects'])->name('adminTeacherSubjects');
    Route::post('/teacherSubjects', [App\Http\Controllers\HomeController::class, 'saveTeacherSubjects']);
    Route::get('/totalTeacher', [App\Http\Controllers\HomeController::class, 'totalTeacher'])->name('adminTotalTeacher');
    Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('adminTotalTeacherdelete');
    Route::get('/totalStudents', [App\Http\Controllers\HomeController::class, 'totalStudents'])->name('adminTotalStudents');
    Route::get('/allExams', [App\Http\Controllers\HomeController::class, 'allExams'])->name('adminAllExams');


});
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
////////////////doctor////////////////
Route::group(['prefix' => 'doctor', 'middleware' => ['isDoctor', 'auth', 'PrevetBackHistory']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DoctorController::class, 'dashboard'])->name('doctorDashboard');
    Route::get('/changePassword', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('doctorChangePassword');

////////////////doctorExam////////////
    Route::get('/addExam', [App\Http\Controllers\DoctorController::class, 'getDataExam'])->name('doctorAddExam');
    Route::post('/insertExam', [App\Http\Controllers\DoctorController::class, 'insertExam'])->name('doctorInsertExam');
    Route::get('/viewExam', [App\Http\Controllers\DoctorController::class, 'viewExam'])->name('doctorViewExam');
    Route::get('/delete/{id}', [App\Http\Controllers\DoctorController::class, 'deleteExam'])->name('doctorDeleteExam');
    /*  Route::get('/assignExam', [App\Http\Controllers\DoctorController::class, 'assignExam'])->name('doctorAssignExam');
        Route::get('/assigned', [App\Http\Controllers\DoctorController::class, 'sendExam'])->name('doctorSendExam');*/

    ////////////////doctorQuestions/////////
    Route::get('/addQuestions', [App\Http\Controllers\DoctorController::class, 'addQuestions'])->name('doctorAddQuestion');
    Route::get('/editQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'editQuestions'])->name('doctorEditQuestion');
    Route::post('/insertQuestions', [App\Http\Controllers\DoctorController::class, 'insertQuestions'])->name('doctorInsertQuestion');
    Route::get('/viewExam/{id}', [App\Http\Controllers\DoctorController::class, 'viewQuestions'])->name('doctorViewQuestions');
    Route::get('/deleteExam/{id}', [App\Http\Controllers\DoctorController::class, 'deleteQuestions'])->name('doctorDeleteQuestions');
    /////////////////////////////////////////
    Route::get('/examDetails', [App\Http\Controllers\DoctorController::class, 'examDetails'])->name('doctorViewResults');
    Route::get('/results', [App\Http\Controllers\DoctorController::class, 'results'])->name('doctorResults');


});

////////////////student////////////////
Route::group(['prefix' => 'student', 'middleware' => ['isStudent', 'auth', 'PrevetBackHistory']], function () {
    Route::get('/dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('studentDashboard');

});

Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'register_page']);
Route::post('/registerpostPage', [App\Http\Controllers\RegisterController::class, 'register']);

////////////////Approval////////////////
Route::view('/approval', 'doctor.waitForApproval');




