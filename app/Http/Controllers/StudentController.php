<?php

namespace App\Http\Controllers;

use App\Models\Online_exam;
use App\Models\question;
use App\Models\User;
use App\Models\Subject;
use App\Models\Category;
use App\Models\Exam_structure;
use App\Models\Chapter;
use App\Models\Department;
use App\Models\Level;
use App\Models\quest_t_f;
use Illuminate\Http\Request;
use function auth;
use function compact;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function dashboard()
    {
        $users = User::where('id', auth()->user()->id)->select('id', 'level_id', 'department_id')->get();
        //foreach ($users as $user)
         //   $online_exams = Online_exam::where('level_id', $user->level_id)->select('id', 'onlineExam_name', 'onlineExam_marks', 'total_questions', 'onlineExam_duration')->get();
        return view('student\dashboard');

    }


    public function changepassword()
    {
        return view('student\changePassword');

    }

    public function forgetpassword()
    {

        echo 'kkk';
    }


    


    public function showResult()
    {
        //$users = User::where('id', auth()->user()->id)->select('id', 'level_id', 'department_id')->get();
        //foreach ($users as $user)
        $exams = Online_exam::where('level_id', auth()->user()->level_id)->select('id', 'onlineExam_name', 'onlineExam_marks')->get();
        return view('student\Student-Results', compact('exams'));
    }


    public function showSubject()
    {
    $level_id=auth()->user()->level_id;
    $department_id=auth()->user()->department_id;
    $subjects=Subject::where(['department_id'=>$department_id,'level_id'=>$level_id])->get();
       
        return view('student\viewSub', compact('subjects'));
    }

    public function showExam()
    {
    $level_id=auth()->user()->level_id;
    $department_id=auth()->user()->department_id;

  
     $subject_id=Subject::where(['department_id'=>$department_id,'level_id'=>$level_id])->get();
     $online_exams=[];
     
     $subject=[];
 
     foreach($subject_id as $s){
        $exams =Online_exam::where('subject_id',$s->id)->get();
        foreach($exams as $exam){
          array_push($online_exams,$exam);
        }

     }
    

        return view('student\dashboard', ["online_exams" => $online_exams]);
    }

   public function viewExam($idE)
   {
       $examFromDb = Online_exam::find($idE);
       $exam_questions = [];
       $exam_structures = Exam_structure::where('exam_id', $idE)->get();
       foreach($exam_structures as $structure){
           if($structure->question_type == 1){
                // MCQ
                $questions = question::where([
                    ['category_id', $structure->category_id],
                    ['chapter_id', $structure->chaper_number],
                    ['subject_id', $examFromDb->subject_id]
                ])->limit($structure->num_of_question)->inRandomOrder()->get();
                foreach($questions as $question){
                    array_push($exam_questions, $question);
                }

           }
           else {
               // True /F
               $questions = quest_t_f::where([
                ['category_id', $structure->category_id],
                ['chapter_id', $structure->chaper_number],
                ['subject_id', $examFromDb->subject_id]
            ])->limit($structure->num_of_question)->inRandomOrder()->get();
            foreach($questions as $question){
                array_push($exam_questions, $question);
            }
           }
       }
      
      // $exam_questions->shuffle();

        return view('student\viewExam',['questions'=>$exam_questions]);

   }

    public function vieweQuestionMcq($id)
    {
        $questions =question::where('subject_id',$id)->get();
        return view('student.viewQuestions',compact('questions'));
    }
    public function ViewQuesM($idQ,$idS,$idCh,$idC)
    {
        $questions=Question::find($idQ);
        $subjects=Subject::where('id',$idS)->get();
        $chapter=Chapter::where('id',$idCh)->get();
        $category=Category::where('id',$idCh)->get();

        return view('student\ViewQuestSub',compact('questions','subjects','chapter','category'));
    }
    public function viewEQuestioTf($id)
    {

        $questions =quest_t_f::where('subject_id',$id)->get();
        return view('student.viewQuestionTf',compact('questions'));
    }
    public function ViewQuesttTf($idQ,$idS,$idCh,$idC)
    {
        $questions=quest_t_f::find($idQ);
        $subjects=Subject::where('id',$idS)->get();
        $chapters=Chapter::where('id',$idCh)->get();
        $categorie=Category::where('id',$idCh)->get();

        return view('student\ViewQuestSubTf',compact('questions','subjects','chapters','categorie'));
    }
}
