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

    Route::get('/changepassword', [App\Http\Controllers\AdminController::class, 'changepassword'])->name('changePasswordAdmin');
    Route::post('/changePassword',[App\Http\Controllers\AdminController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('/Changepasswords', [App\Http\Controllers\AdminController::class, 'changepasswords'])->name('changePasswordAdmins');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('registerDoc', [App\Http\Controllers\AdminController::class, 'AddDoctor'])->name('AddDoctor');
    Route::post('registerDoc',[App\Http\Controllers\AdminController::class, 'CreateNewDoct']);            
    Route::get('departments', [App\Http\Controllers\AdminController::class, 'departments'])->name('adminDepartments');
    Route::post('/departments', [App\Http\Controllers\AdminController::class, 'savedDepartments'])->name('adminSavedDepartments');
    Route::get('edit/{department_id}', [App\Http\Controllers\AdminController::class,  'editDepartments']);
    Route::put('update/{department_id}', [App\Http\Controllers\AdminController::class, 'Updatedepartment'])->name('departmentUpdate');
    Route::get('/deleteDepartment/{id}', [App\Http\Controllers\AdminController::class, 'destroyDepartment'])->name('admindepartmentdelete');
    Route::get('levels', [App\Http\Controllers\AdminController::class, 'levels'])->name('adminLevels');
    Route::post('/levels', [App\Http\Controllers\AdminController::class, 'savedLevels'])->name('adminSavedLevels');
    Route::get('edit/level/{level_id}', [App\Http\Controllers\AdminController::class,  'editLevels']);
    Route::put('update/level/{level_id}', [App\Http\Controllers\AdminController::class, 'Updatelevel'])->name('levelUpdate');
    Route::get('/deleteLevel/{level_id}', [App\Http\Controllers\AdminController::class, 'destroyLevel'])->name('adminleveldelete');
    Route::get('/subjects', [App\Http\Controllers\AdminController::class, 'subjects'])->name('adminSubjects');
    Route::post('/subjects', [App\Http\Controllers\AdminController::class, 'saveSubjects'])->name('adminSavedSubjects');
    Route::get('edit/subject/{subject_id}', [App\Http\Controllers\AdminController::class,  'editSubjects']);
    Route::put('update/subject/{subject_id}', [App\Http\Controllers\AdminController::class, 'Updatesubject'])->name('subjectUpdate');
    Route::get('/deleteSubject/{subject_id}', [App\Http\Controllers\AdminController::class, 'destroySubject'])->name('adminsubjectdelete');
    Route::get('subjectDoctor', [App\Http\Controllers\AdminController::class, 'DoctorSubject'])->name('DoctorSubject');
    Route::post('/subjectDoctor', [App\Http\Controllers\AdminController::class, 'savedDoctorSubject'])->name('savedDoctorSubject');
    Route::get('/deleteSubjectsDoctor/{subject_id}', [App\Http\Controllers\AdminController::class, 'destroySubjetDoctor'])->name('destroyDoctorSubject');
    Route::get('edit/subjectDoctor/{professor_id}', [App\Http\Controllers\AdminController::class,  'editsubjectDoctor']);
   Route::put('update/subjectDoctor/{professor_id}', [App\Http\Controllers\AdminController::class, 'UpdatesubjectDoctor'])->name('subjectDoctorUpdate');

   // Route::get('edit/subjectDoctor/{subject_id}', [App\Http\Controllers\AdminController::class,  'editsubjectDoctor']);
   // Route::put('update/subjectDoctor/{subject_id}', [App\Http\Controllers\AdminController::class, 'UpdatesubjectDoctor'])->name('subjectDoctorUpdate');


    Route::get('/pendingTeacher', [App\Http\Controllers\AdminController::class,'pendingTeacher'])->name('adminPendingTeacher');
    Route::get('/pendingTeacher/{id}', [App\Http\Controllers\AdminController::class,'approve'])->name('adminapprovePendingTeacher');
    Route::get('/deletependingTeacher/{id}', [App\Http\Controllers\AdminController::class, 'destroypendingTeacher'])->name('adminpendingTeacherdelete');
    Route::get('/teacherSubjects', [App\Http\Controllers\AdminController::class, 'teacherSubjects'])->name('adminTeacherSubjects');
    Route::post('/teacherSubjects/save', [App\Http\Controllers\AdminController::class, 'saveTeacherSubjects']);
    Route::get('/totalTeacher', [App\Http\Controllers\AdminController::class, 'totalTeacher'])->name('adminTotalTeacher');
    Route::get('TeacherProfile/{id}', [App\Http\Controllers\AdminController::class,  'ViewProfileDoctor'])->name('adminViewProfileDoctor');
    Route::get('StudentProfile/{id}', [App\Http\Controllers\AdminController::class,  'ViewProfileStudent'])->name('adminViewProfileStudent');
    Route::get('ViewTeacherProfile/{id}', [App\Http\Controllers\AdminController::class,  'ViewProfileOfDoctor'])->name('adminViewProfileOfDoctor');
    Route::get('/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('adminTotalTeacherdelete');
    Route::get('/totalStudents', [App\Http\Controllers\AdminController::class, 'totalStudents'])->name('adminTotalStudents');
    Route::get('/deleteStudent/{id}', [App\Http\Controllers\AdminController::class, 'destroyStudent'])->name('destroystudent');
    Route::get('/allExams', [App\Http\Controllers\AdminController::class, 'allExams'])->name('adminAllExams');
   
    /*
    Route::get('/changepassword', [App\Http\Controllers\HomeController::class, 'changepassword'])->name('changePasswordAdmin');
    Route::post('/changePassword',[App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
    Route::get('/forgetpassword', [App\Http\Controllers\HomeController::class, 'forgetpassword'])->name('forgetPasswordAdmin');
    Route::get('/Changepasswords', [App\Http\Controllers\HomeController::class, 'changepasswords'])->name('changePasswordAdmins');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('adminDashboard');
    Route::get('departments', [App\Http\Controllers\HomeController::class, 'departments'])->name('adminDepartments');
    Route::post('/departments', [App\Http\Controllers\HomeController::class, 'savedDepartments'])->name('adminSavedDepartments');
    Route::get('edit/{department_id}', [App\Http\Controllers\HomeController::class,  'editDepartments']);
    Route::put('update/{department_id}', [App\Http\Controllers\HomeController::class, 'Updatedepartment'])->name('departmentUpdate');
    Route::get('/deleteDepartment/{id}', [App\Http\Controllers\HomeController::class, 'destroyDepartment'])->name('admindepartmentdelete');
    Route::get('levels', [App\Http\Controllers\HomeController::class, 'levels'])->name('adminLevels');
    Route::post('/levels', [App\Http\Controllers\HomeController::class, 'savedLevels'])->name('adminSavedLevels');
    Route::get('edit/level/{level_id}', [App\Http\Controllers\HomeController::class,  'editLevels']);
    Route::put('update/level/{level_id}', [App\Http\Controllers\HomeController::class, 'Updatelevel'])->name('levelUpdate');
    Route::get('/deleteLevel/{level_id}', [App\Http\Controllers\HomeController::class, 'destroyLevel'])->name('adminleveldelete');
    Route::get('/subjects', [App\Http\Controllers\HomeController::class, 'subjects'])->name('adminSubjects');
    Route::post('/subjects', [App\Http\Controllers\HomeController::class, 'saveSubjects'])->name('adminSavedSubjects');
    Route::get('edit/subject/{subject_id}', [App\Http\Controllers\HomeController::class,  'editSubjects']);
    Route::put('update/subject/{subject_id}', [App\Http\Controllers\HomeController::class, 'Updatesubject'])->name('subjectUpdate');
    Route::get('/deleteSubject/{subject_id}', [App\Http\Controllers\HomeController::class, 'destroySubject'])->name('adminsubjectdelete');
    Route::get('subjectDoctor', [App\Http\Controllers\HomeController::class, 'DoctorSubject'])->name('DoctorSubject');
    Route::post('/subjectDoctor', [App\Http\Controllers\HomeController::class, 'savedDoctorSubject'])->name('savedDoctorSubject');
    Route::get('/deleteSubjectsDoctor/{subject_id}', [App\Http\Controllers\HomeController::class, 'destroySubjetDoctor'])->name('destroyDoctorSubject');
    Route::get('edit/subjectDoctor/{professor_id}', [App\Http\Controllers\HomeController::class,  'editsubjectDoctor']);
    Route::put('update/subjectDoctor/{professor_id}', [App\Http\Controllers\HomeController::class, 'UpdatesubjectDoctor'])->name('subjectDoctorUpdate');
    Route::get('/pendingTeacher', [App\Http\Controllers\HomeController::class,'pendingTeacher'])->name('adminPendingTeacher');
    Route::get('/pendingTeacher/{id}', [App\Http\Controllers\HomeController::class,'approve'])->name('adminapprovePendingTeacher');
    Route::get('/deletependingTeacher/{id}', [App\Http\Controllers\HomeController::class, 'destroypendingTeacher'])->name('adminpendingTeacherdelete');
    Route::get('/teacherSubjects', [App\Http\Controllers\HomeController::class, 'teacherSubjects'])->name('adminTeacherSubjects');
    Route::post('/teacherSubjects/save', [App\Http\Controllers\HomeController::class, 'saveTeacherSubjects']);
    Route::get('/totalTeacher', [App\Http\Controllers\HomeController::class, 'totalTeacher'])->name('adminTotalTeacher');
    Route::get('TeacherProfile/{id}', [App\Http\Controllers\HomeController::class,  'ViewProfileDoctor'])->name('adminViewProfileDoctor');
    Route::get('StudentProfile/{id}', [App\Http\Controllers\HomeController::class,  'ViewProfileStudent'])->name('adminViewProfileStudent');
    Route::get('ViewTeacherProfile/{id}', [App\Http\Controllers\HomeController::class,  'ViewProfileOfDoctor'])->name('adminViewProfileOfDoctor');
    Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('adminTotalTeacherdelete');

    Route::get('/totalStudents', [App\Http\Controllers\HomeController::class, 'totalStudents'])->name('adminTotalStudents');
    Route::get('/deleteStudent/{id}', [App\Http\Controllers\HomeController::class, 'destroyStudent'])->name('destroystudent');
    Route::get('/allExams', [App\Http\Controllers\HomeController::class, 'allExams'])->name('adminAllExams');
*/

});

                     ////////////////doctor////////////////
Route::group(['prefix' => 'doctor',  'middleware' => ['isDoctor','auth','PrevetBackHistory']], function(){
    Route::get('/dashboard', [App\Http\Controllers\DoctorController::class, 'dashboard'])->name('doctorDashboard');


    Route::get('/changePassword', [App\Http\Controllers\DoctorController::class, 'changePassword'])->name('doctorChangePassword');
    Route::get('/updatePassword/{id}', [App\Http\Controllers\DoctorController::class, 'updatePassword'])->name('doctorUpdatePassword');

////////////////doctorExam////////////
    Route::get('/addExam', [App\Http\Controllers\DoctorController::class, 'getDataExam'])->name('doctorAddExam');
    Route::post('/insertExam', [App\Http\Controllers\DoctorController::class, 'insertExam'])->name('doctorInsertExam');
    Route::get('/viewExam', [App\Http\Controllers\DoctorController::class, 'viewExam'])->name('doctorViewExam');
    Route::get('/delete/{id}', [App\Http\Controllers\DoctorController::class, 'deleteExam'])->name('doctorDeleteExam');
   
    ////////////////doctorQuestions/////////
    Route::get('/addQuestions', [App\Http\Controllers\DoctorController::class, 'addQuestions'])->name('doctorAddQuestion');
    Route::get('/addExamQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'addExamQuestions'])->name('doctorAssignQuestion');
    Route::get('/editQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'editQuestions'])->name('doctorEditQuestion');
    Route::post('/updateQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'updateQuestions'])->name('doctorUpdateQuestion');
    Route::post('/insertQuestions', [App\Http\Controllers\DoctorController::class, 'insertQuestions'])->name('doctorInsertQuestion');
    Route::post('/insertQuestions', [App\Http\Controllers\DoctorController::class, 'insertQuestions'])->name('doctorInsertQuestion');
    Route::get('/viewExam/{id}', [App\Http\Controllers\DoctorController::class, 'viewQuestions'])->name('doctorViewQuestions');
    Route::get('/deleteExam/{id}', [App\Http\Controllers\DoctorController::class, 'deleteQuestions'])->name('doctorDeleteQuestions');
    /////////////////////////////////////////



});

                     ////////////////student////////////////
Route::group(['prefix' => 'student',  'middleware' => ['isStudent','auth','PrevetBackHistory']], function(){
    Route::get('/dashboard', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('studentDashboard');
    Route::get('/changepassword', [App\Http\Controllers\StudentController::class, 'changepassword'])->name('changePasswordStudent');
    Route::get('/forgetpassword', [App\Http\Controllers\StudentController::class, 'forgetpassword'])->name('forgetPasswordStudent');
    Route::get('/startExam/{id}', [App\Http\Controllers\StudentController::class, 'startExam'])->name('startExamStudent');
    Route::get('/showResult', [App\Http\Controllers\StudentController::class, 'showResult'])->name('showResultStudent');
    Route::get('/submitexam', [App\Http\Controllers\StudentController::class, 'submitexam'])->name('submitexamStudent');


});

Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'register_page']);
Route::post('/registerpostPage', [App\Http\Controllers\RegisterController::class, 'register']);





