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
    Route::get('/forgetpassword', [App\Http\Controllers\AdminController::class, 'forgetpassword'])->name('forgetPasswordAdmin');
    Route::get('/Changepasswords', [App\Http\Controllers\AdminController::class, 'changepasswords'])->name('changePasswordAdmins');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('adminDashboard');
    Route::get('departments', [App\Http\Controllers\AdminController::class, 'departments'])->name('adminDepartments');
    Route::post('/departments', [App\Http\Controllers\AdminController::class, 'savedDepartments'])->name('adminSavedDepartments');
    Route::get('registerDoc', [App\Http\Controllers\AdminController::class, 'AddDoctor'])->name('AddDoctor');
    Route::post('registerDoc',[App\Http\Controllers\AdminController::class, 'CreateNewDoct']);   

    Route::get('registerStu', [App\Http\Controllers\AdminController::class, 'AddStu'])->name('AddStudent');
    Route::post('registerStu',[App\Http\Controllers\AdminController::class, 'CreateNewStu']);   


    Route::get('chapters', [App\Http\Controllers\AdminController::class, 'chapters'])->name('adminChapters');
    Route::post('/chapters', [App\Http\Controllers\AdminController::class, 'savedChapters'])->name('adminSavedChapters');
    Route::get('edit/chapters/{id}', [App\Http\Controllers\AdminController::class,  'editchapters']);
    Route::put('update/chapters/{id}', [App\Http\Controllers\AdminController::class, 'Updatechapters'])->name('chapterUpdate');
   // Route::put('update/subject/{subject_id}', [App\Http\Controllers\AdminController::class, 'Updatesubject'])->name('subjectUpdate');
    Route::get('/deletechapters/{id}', [App\Http\Controllers\AdminController::class, 'destroyChapters'])->name('adminChaptertdelete');

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
   
    
});
                     ////////////////doctor////////////////
Route::group(['prefix' => 'doctor',  'middleware' => ['isDoctor','auth','PrevetBackHistory']], function(){
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





