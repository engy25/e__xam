<?php

namespace App\Http\Controllers;

use App\Models\Online_exam;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\question;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function dashboard()
    {
        $users = User::where('id',auth()->user()->id)->select('id','level_id','department_id')->get();
        foreach ($users as $user)
            $online_exams =Online_exam::where('level_id',$user->level_id)->select('id','onlineExam_name','onlineExam_marks','total_questions','onlineExam_duration')->get();
        return view('student\dashboard',compact('online_exams'));

    }
    public function changepassword()
    {
        return view('student\changePassword');

    }

    public function forgetpassword()
    {

        echo 'kkk';
    }



    public function startExam($id){
        $questions = question::where('onlineExam_id',$id)->select('onlineExam_id','question_title','option_one','option_two','option_three','option_four','mark')->get();
        return view('student.Student-startExam',compact('questions'));
    }


    public function submitexam (Request $request){
        /*$question = question::where('onlineExam_id',$request->examID)->select('answer_option')->get();
        $questions =new question();
        $result =0;
        foreach ($questions as $question )
            if ($request->option == $question-> answer_option )
                $result =$result + $question->mark ;

        return $result;*/

        return $request->option;
    }

    public function showResult (){

        return view('student\Student-Results');
    }

}
