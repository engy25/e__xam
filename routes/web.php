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
    Route::get('edit/stu/{id}', [App\Http\Controllers\AdminController::class,  'editStudent']);
    Route::put('update/stu/{id}', [App\Http\Controllers\AdminController::class, 'UpdateeditStudent'])->name('StudentUpdated');
    Route::get('edit/prof/{id}', [App\Http\Controllers\AdminController::class,  'editProfessors']);
    Route::put('update/prof/{id}', [App\Http\Controllers\AdminController::class, 'UpdateProfessors'])->name('ProfessorUpdated');
    Route::get('chapters', [App\Http\Controllers\AdminController::class, 'chapters'])->name('adminChapters');
    Route::post('/chapters', [App\Http\Controllers\AdminController::class, 'savedChapters'])->name('adminSavedChapters');
    Route::get('edit/chapters/{id}', [App\Http\Controllers\AdminController::class,  'editchapters']);
    Route::put('update/chapters/{id}', [App\Http\Controllers\AdminController::class, 'Updatechapters'])->name('chapterUpdate');
    Route::get('/deletechapters/{id}', [App\Http\Controllers\AdminController::class, 'destroyChapters'])->name('adminChaptertdelete');
    Route::get('edit/{department_id}', [App\Http\Controllers\AdminController::class,  'editDepartments']);
    Route::put('update/{department_id}', [App\Http\Controllers\AdminController::class, 'Updatedepartment'])->name('departmentUpdate');
    Route::get('/deleteDepartment/{department_id}', [App\Http\Controllers\AdminController::class, 'destroyDepartment'])->name('admindepartmentdelete');
    Route::get('levels', [App\Http\Controllers\AdminController::class, 'levels'])->name('adminLevels');
    Route::post('/levels', [App\Http\Controllers\AdminController::class, 'savedLevels'])->name('adminSavedLevels');
    Route::get('edit/level/{level_id}', [App\Http\Controllers\AdminController::class,  'editLevels']);
    Route::put('update/level/{level_id}', [App\Http\Controllers\AdminController::class, 'Updatelevel'])->name('levelUpdate');
    Route::get('/deleteLevel/{level_id}', [App\Http\Controllers\AdminController::class, 'destroyLevel'])->name('adminleveldelete');
    Route::get('/subjects', [App\Http\Controllers\AdminController::class, 'subjects'])->name('adminSubjects');
    Route::post('/subjects', [App\Http\Controllers\AdminController::class, 'saveSubjects'])->name('adminSavedSubjects');
    Route::get('edit/subject/{id}', [App\Http\Controllers\AdminController::class,  'editSubjects']);
    Route::put('update/subject/{id}', [App\Http\Controllers\AdminController::class, 'Updatesubject'])->name('subjectUpdate');
    Route::get('/deleteSubject/{id}', [App\Http\Controllers\AdminController::class, 'destroySubject'])->name('adminsubjectdelete');
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
    //Route::get('StudentProfile/{id}', [App\Http\Controllers\AdminController::class,  'ViewProfileStudent'])->name('adminViewProfileStudent');
    Route::get('StudentProfile/{idS}/level/{idL}/dep/{idD}',[
        'as' => 'StudentProfile.level.dep', 
        'uses' => 'App\Http\Controllers\AdminController@ViewProfileStudent'
    ]);
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
    Route::get('/subjectAddExQu', [App\Http\Controllers\DoctorController::class, 'VsubjectAddExQu'])->name('subjectAddExQu');

    Route::get('ViewQuestionsExam/{idE}/Sub/{idS}',[
        'as' => 'ViewQuestionsExam.Sub', 
        'uses' => 'App\Http\Controllers\DoctorController@ViewExamQuestions'
    ]);

    Route::get('/subjectAddQuTF/{id}', [App\Http\Controllers\DoctorController::class, 'subjectAddQuTF'])->name('subjectAddQuTF');
    Route::post('/addtQuestionTF/{id}', [App\Http\Controllers\DoctorController::class, 'addQuestionTf'])->name('doctoraddQuestionTF');
    Route::get('/viewQuestionTF/{id}', [App\Http\Controllers\DoctorController::class, 'viewEQuestionTf'])->name('doctorViewQuestionTf');
    Route::get('viewQuestionTf/{idQ}/Sub/{idS}/chapt/{idCh}/cat/{idC}',[
        'as' => 'viewQuestionTf.Sub.chapt.cat', 
        'uses' => 'App\Http\Controllers\DoctorController@ViewQuesTf'
    ]);
    Route::get('editQuestionTf/{idQ}/Sub/{idS}', [
        'as' => 'editQuestionTf.Sub', 
        'uses' => 'App\Http\Controllers\DoctorController@editQuestionTf'
    ]);
    Route::post('updateQuestionTf/{idQ}/Sub/{idS}', [
        'as' => 'updateQuestionTf.Sub', 
        'uses' => 'App\Http\Controllers\DoctorController@updateQuestionTf'
    ]);
    Route::get('/subjectAddQues/{id}', [App\Http\Controllers\DoctorController::class, 'subjectAddQues'])->name('subjectAddQues');
    Route::post('/addtQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'addQuestion'])->name('doctoraddQuestion');
    Route::get('/viewQuestion/{id}', [App\Http\Controllers\DoctorController::class, 'viewEQuestion'])->name('doctorViewQuestion');
    Route::get('/viewExam', [App\Http\Controllers\DoctorController::class, 'viewExam'])->name('doctorViewExam');
  
   Route::get('/deleteQues/{id}', [App\Http\Controllers\DoctorController::class, 'deleteQuestion'])->name('doctorDeleteQuestion');
    Route::get('/delete/{id}', [App\Http\Controllers\DoctorController::class, 'deleteExam'])->name('doctorDeleteExam');
    Route::get('viewQuestion/{idQ}/Sub/{idS}/chapt/{idCh}/cat/{idC}',[
        'as' => 'viewQuestion.Sub.chapt.cat', 
        'uses' => 'App\Http\Controllers\DoctorController@ViewQues'
    ]);

    Route::get('editQuestion/{idQ}/Sub/{idS}', [
        'as' => 'editQuestion.Sub', 
        'uses' => 'App\Http\Controllers\DoctorController@editQuestion'
    ]);

    Route::post('updateQuestion/{idQ}/Sub/{idS}', [
        'as' => 'updateQuestion.Sub', 
        'uses' => 'App\Http\Controllers\DoctorController@updateQuestion'
    ]);

    Route::get('/destroyQuesTF/{id}', [App\Http\Controllers\DoctorController::class, 'destroyQuesTF'])->name('destroyQuesTF');
    ////////////////doctorQuestions/////////
     Route::get('/addQuestions', [App\Http\Controllers\DoctorController::class, 'addQuestions'])->name('doctorAddQuestion');
   
    Route::get('/viewExam/{id}', [App\Http\Controllers\DoctorController::class, 'viewQuestions'])->name('doctorViewQuestions');
    Route::get('/editQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'editQuestions'])->name('doctorEditQuestion');
    Route::post('/insertQuestions', [App\Http\Controllers\DoctorController::class, 'insertQuestions'])->name('doctorInsertQuestion');
    Route::post('/updateQuestions/{id}', [App\Http\Controllers\DoctorController::class, 'updateQuestions'])->name('doctorUpdateQuestion');

    Route::get('/deleteExam/{id}', [App\Http\Controllers\DoctorController::class, 'deleteQuestions'])->name('doctorDeleteQuestions');
    /////////////////////////////////////////
 
    Route::get('/examDetails', [App\Http\Controllers\DoctorController::class, 'examDetails'])->name('doctorViewResults');
    Route::get('/results', [App\Http\Controllers\DoctorController::class, 'results'])->name('doctorResults');

    Route::get('chapters', [App\Http\Controllers\DoctorController::class, 'chapters'])->name('docChapters');
    Route::post('/chapters', [App\Http\Controllers\DoctorController::class, 'savedChapters'])->name('docSavedChapters');
    Route::get('edit/chapters/{id}', [App\Http\Controllers\DoctorController::class,  'editchapters']);
    Route::put('update/chapters/{id}', [App\Http\Controllers\DoctorController::class, 'Updatechapters'])->name('chapterUpdate');
   // Route::put('update/subject/{subject_id}', [App\Http\Controllers\AdminController::class, 'Updatesubject'])->name('subjectUpdate');
    Route::get('/deletechapters/{id}', [App\Http\Controllers\DoctorController::class, 'destroyChapters'])->name('docChaptertdelete');
    Route::get('/viewExamdoc/{id}', [App\Http\Controllers\DoctorController::class, 'viewExams'])->name('doctviewExam');
    
///////////////

Route::post('storeExamStruc/{idE}/Sub/{idS}', [
    'as' => 'storeExamStruc.Sub', 
    'uses' => 'App\Http\Controllers\DoctorController@storeExamStruc'
]);


});

                     ////////////////student////////////////
Route::group(['prefix' => 'student',  'middleware' => ['isStudent','auth','PrevetBackHistory']], function(){
    Route::get('/dashboard', [App\Http\Controllers\StudentController::class, 'showExam'])->name('studentDashboard');
    Route::get('/changepassword', [App\Http\Controllers\StudentController::class, 'changepassword'])->name('changePasswordStudent');
    Route::get('/forgetpassword', [App\Http\Controllers\StudentController::class, 'forgetpassword'])->name('forgetPasswordStudent');
    Route::get('/startExam/{id}', [App\Http\Controllers\StudentController::class, 'startExam'])->name('startExamStudent');
    Route::get('/showResult', [App\Http\Controllers\StudentController::class, 'showResult'])->name('showResultStudent');
    Route::get('/submitexam', [App\Http\Controllers\StudentController::class, 'submitexam'])->name('submitexamStudent');
//////////////////////////////
Route::get('/showS', [App\Http\Controllers\StudentController::class, 'showSubject'])->name('showSubjectStudent');
Route::get('/viewQuestionmcq/{id}', [App\Http\Controllers\StudentController::class, 'vieweQuestionMcq'])->name('stviewQuestionMcq');
Route::get('viewQuestionM/{idQ}/Sub/{idS}/chapt/{idCh}/cat/{idC}',[
    'as' => 'viewQuestionM.Sub.chapt.cat', 
    'uses' => 'App\Http\Controllers\StudentController@ViewQuesM'
]);
Route::get('/viewQuestioTF/{id}', [App\Http\Controllers\StudentController::class, 'viewEQuestioTf'])->name('stuViewQuestioTf');
Route::get('viewQuestioTf/{idQ}/Sub/{idS}/chapt/{idCh}/cat/{idC}',[
    'as' => 'viewQuestioTf.Sub.chapt.cat', 
    'uses' => 'App\Http\Controllers\StudentController@ViewQuesttTf'
]);
Route::get('/viewExam/{idE}', [App\Http\Controllers\StudentController::class, 'viewExam'])->name('viewExam');
Route::post('/storeAnsweres', [App\Http\Controllers\StudentController::class, 'storeAnsweres'])->name('storeAnsweres');

});

Route::get('/registerPage', [App\Http\Controllers\RegisterController::class, 'register_page']);
Route::post('/registerpostPage', [App\Http\Controllers\RegisterController::class, 'register']);





