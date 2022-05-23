<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\question;
use App\Models\Online_exam;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    //
    public function dashboard()
    {
        $Doctor = User::where('role_id', 2)->get();
        $countStudent = User::where('role_id', 3)->count();
        $countExam = Online_exam::count();
        $countQuestion = Question::count();

        return view('doctor\dashboard', compact('Doctor', 'countStudent', 'countExam', 'countQuestion'));

    }

    public function changePassword()
    {
        $user_id = auth()->user()->id;
        $users = User::where('id', $user_id)->select('id', 'password')->get();
        return view('doctor.changePassword', compact('users'));

    }

    public function updatePassword(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $users = User::where('id', $user_id)->select('id', 'password')->get();
        if ($request->doctorConfirmNewPassword === $request->doctorNewPassword) {
            if ($users->password === $request->doctorCurrentPassword) {
                $users->update([
                    'password' => $request->doctorNewPassword,
                ]);
            } else {
                return 'Error';
            }
        } else {
            return 'Error!';
        }

    }

    public function getDataExam()
    {
        $user_id = auth()->user()->id;
        $users = User::where('id', $user_id)->select('id', 'id')->get();
        foreach ($users as $user) {
            $levels = Level::where('id', $user->id)->select('id', 'level_name')->get();
            $departments = Department::where('id', $user->id)->select('id', 'department_name')->get();
            $subjects = Subject::select('id', 'subject_name')->get();

        }
        return view('doctor.addExam', compact('subjects', 'levels', 'departments'));

    }

    public function viewExam()
    {

        $user_id = auth()->user()->id;
        $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name', 'onlineExam_duration', 'total_questions', 'onlineExam_marks', 'onlineExam_pass', 'onlineExam_datetime')->get();
        return view('doctor.viewExams', compact('exams'));
    }

    public function deleteExam($id)
    {

        $exam = Online_exam::find($id);
        $exam->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully!']);
    }

    public function deleteQuestions($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully!']);


    }

    public function examDetails()
    {

        return view('doctor.viewResults');
    }

    public function editQuestions($id)
    {
        $questions = Question::find($id);
        $questions = Question::where('id', $id)->select('id', 'onlineExam_id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'category', 'answer_option')->get();
        return view('doctor.editQuestions', compact('questions'));
    }

    public function updateQuestions(Request $request, $id)
    {
        $questions = Question::find($id);
        $rules = $this->getUpdatedRulesQuestions();
        $messages = $this->getUpdatedRulesQuestions();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $questions->update([

            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category' => $request->questionCategory,
        ]);
        return redirect()->back()->with(['success' => 'Question Updated Successfully!']);


    }

    protected function getUpdatedRulesQuestions()
    {
        return $rules = [

            'questionTitle' => 'required',
            'questionMark' => 'required | max:100 | numeric',
            'questionCategory' => 'required',
            'questionOptionOne' => 'required',
            'questionOptionTwo' => 'required',
            'questionOptionThree' => 'required',
            'questionOptionFour' => 'required',
            'questionAnswer' => 'required',
        ];
    }

    public function addQuestions()
    {
        $user_id = auth()->user()->id;
        $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name', 'total_questions')->get();
        return view('doctor.addQuestions', compact('exams'));
    }

    public function addExamQuestions(Request $request, $id)
    {
        return $request->examNames;
        //$exams = Online_exam::find($id);
        //$exams = Online_exam::where('id', $id)->select('id', 'total_questions')->get();
        //$exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name','total_questions')->get();
        //return compact('exams');
        //return view('doctor.addQuestions', compact('exams'));
    }

    public function insertQuestions(Request $request)
    {


        $rules = $this->getRulesQuestions();
        $messages = $this->getMessagesQuestions();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Question::create([
            'onlineExam_id' => $request->questionName,
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category' => $request->questionCategory,

        ]);


        return redirect()->back()->with(['success' => 'Question Added Successfully!']);
    }


public function insertExam(Request $request)
{
    //Validation Rules:
    $rules = $this->getRulesExam();
    $messages = $this->getMessagesExam();
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    Online_exam::insert([
        'user_id' => auth()->user()->id,
        'onlineExam_name' => $request->examName,
        'onlineExam_marks' => $request->totalMarks,
        'onlineExam_pass' => $request->passMark,
        'onlineExam_datetime' => $request->examDate,
        'total_questions' => $request->questionCount,
        'onlineExam_duration' => $request->totalTime,
        'onlineExam_createBy' => auth()->user()->first_name,
        /*'onlineExam_name'=>'examLevel',
        'onlineExam_name'=>'examDepartment',
        'onlineExam_name'=>'examSubject',*/
    ]);
    return redirect()->back()->with(['success' => 'Exam Added Successfully!']);

}

protected
function getRulesExam()
{
    return $rules = [
        'examName' => 'required | unique:online_exams,onlineExam_name',
        'totalMarks' => 'required | max:100 | numeric',
        'passMark' => 'required | max:60 | numeric',
        'examDate' => 'required',
        'questionCount' => 'required | numeric',
        //'examLevel' => 'required',
        //'examDepartment' => 'required',
        //'examSubject' => 'required',
        'totalTime' => 'required | numeric',
    ];
}

protected
function getMessagesExam()
{
    return $messages = [
        'examName.required' => 'This Field is required',
        'examName.unique:online_exams,onlineExam_name' => 'Name should be Unique',
        'totalMarks.required' => 'This Field is required',
        'totalMarks.max:100' => 'Total Marks must not exceed 100',
        'totalMarks.numeric' => 'Total Marks must be Numeric',
        'passMark.required' => 'This Field is required',
        'passMark.max:60' => 'Pass Mark must not exceed 60',
        'passMark.numeric' => 'Pass Mark must be Numeric',
        'examDate.required' => 'This Field is required',
        'questionCount.required' => 'This Field is required',
        'questionCount.numeric' => 'Number of Questions must be Numeric',
        'examLevel.required' => 'This Field is required',
        'examDepartment.required' => 'This Field is required',
        'examSubject.required' => 'This Field is required',
        'totalTime.required' => 'This Field is required',
        'totalTime.numeric' => 'Duration of Exam must be Numeric',
    ];
}

public
function results()
{
    return view('doctor.results');
}

public
function viewQuestions(Request $request)
{
    $questions = Question::where('onlineExam_id', $request->id)->select('id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'category', 'answer_option')->get();
    return view('doctor.viewQuestions', compact('questions'));
}

protected
function getRulesQuestions()
{
    return $rules = [
        'questionName' => 'required',
        'questionTitle' => 'required',
        'questionMark' => 'required | max:100 | numeric',
        'questionCategory' => 'required',
        'questionOptionOne' => 'required',
        'questionOptionTwo' => 'required',
        'questionOptionThree' => 'required',
        'questionOptionFour' => 'required',
        'questionAnswer' => 'required',
    ];
}

protected
function getMessagesQuestions()
{
    return $messages = [
        'questionName.required' => 'This Field is required',
        'questionQuestion.required' => 'This Field is required',
        'questionMark.required' => 'This Field is required',
        'questionMark.max:100' => 'Question Mark must not Exceed 100',
        'questionMark.numeric' => 'This Field is required',
        'questionCategory.required' => 'This Field is required',
        'questionOptionOne.required' => 'This Field is required',
        'questionOptionTwo.required' => 'This Field is required',
        'questionOptionThree.required' => 'This Field is required',
        'questionOptionFour.required' => 'This Field is required',
        'questionAnswer.required' => 'This Field is required',

    ];

}

protected
function getUpdatedMessagesQuestions()
{
    return $messages = [

        'questionQuestion.required' => 'This Field is required',
        'questionMark.required' => 'This Field is required',
        'questionMark.max:100' => 'Question Mark must not Exceed 100',
        'questionMark.numeric' => 'This Field is required',
        'questionCategory.required' => 'This Field is required',
        'questionOptionOne.required' => 'This Field is required',
        'questionOptionTwo.required' => 'This Field is required',
        'questionOptionThree.required' => 'This Field is required',
        'questionOptionFour.required' => 'This Field is required',
        'questionAnswer.required' => 'This Field is required',

    ];

}

/*public function assignExam()
    {

        $user_id = auth()->user()->id;
        $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name')->get();
        return view('doctor.assignExam',compact('exams'));
    }

    public function sendExam(){
        return 'Exam Assigned Successfully!';
    }*/
}
