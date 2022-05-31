<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Department;
use App\Models\Level;
use App\Models\Online_exam;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Category;
use App\Models\quest_t_f;
use App\Models\User;
use App\Models\Exam_structure;
use App\Models\Professor_subject;
use App\Http\Requests\QuestMcqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ExamRequest;
use App\Http\Requests\QuestTfRequest;
use function auth;
use function compact;
use function redirect;
use function view;

class DoctorController extends Controller
{
    public $Doctor;

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
        return view('auth\passwords\changePassword');

    }

    public function getDataExam()
    {
        $user_id=auth()->user()->id;

        $professor_subjects=Professor_subject::join('users','users.id','=','professor_subjects.professor_id')
        ->join('subjects','subjects.id','=','professor_subjects.subject_id')
        ->where('professor_id',$user_id)
        ->get(['subjects.subject_name','subjects.id']);

        $exams = Online_exam::all();
        return view('doctor\addExam', compact('exams','professor_subjects'));
    }

    public function viewExams($id)
    {
        $examStructure=Exam_structure::where('exam_id',$id)->get();
     
      
        return view('doctor.viewExamStructure',['examStructure'=>$examStructure]);

    }


    public function ViewExamQuestions($idE,$idS)
    {
    
        $Online_exam=Online_exam::find($idE);
        $subjects=Subject::where('id',$idS)->first();
        $chapters=Chapter::where('subject_id',$idS)->get();
        $categorie=Category::get();
        return view('doctor\examquesSt',compact('Online_exam','subjects','chapters','categorie'));
    }



    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully!']);

    }

    public function viewExam()
    {
        $exams = Online_exam::get();
        return view('doctor\viewExams', compact('exams'));
    }

    public function deleteExam($id)
    {

        $exam = Online_exam::find($id);
        $exam->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully!']);
    }

    public function examDetails()
    {

        return view('doctor.viewResults');
    }
  

   
    public function insertExam(Request $request)
    {
        Online_exam::Create
        ([
           
            'onlineExam_name' => $request->onlineExam_name,
            'onlineExam_marks' => $request->onlineExam_marks,
            'onlineExam_pass' => $request->onlineExam_pass,
            'onlineExam_datetime' => $request->onlineExam_datetime,
            'total_questions' => $request->total_questions,
            'onlineExam_duration' => $request->onlineExam_duration,
            'onlineExam_createBy' => auth()->user()->email,
            'subject_id'=>$request->subject_id,
        
        ]);
        return redirect()->back()->with(['success' => 'Exam Added Successfully!']);

    }
    public function ViewQues($idQ,$idS,$idCh,$idC)
    {
        $questions=Question::find($idQ);
        $subjects=Subject::where('id',$idS)->get();
        $chapters=Chapter::where('id',$idCh)->get();
        $categorie=Category::where('id',$idCh)->get();

        return view('doctor\ViewQuestSub',compact('questions','subjects','chapters','categorie'));
    }
    

    public function VsubjectAddExQu()
    {
        $user_id=auth()->user()->id;

        $professor_subjects=Professor_subject::join('users','users.id','=','professor_subjects.professor_id')
        ->join('subjects','subjects.id','=','professor_subjects.subject_id')
        ->where('professor_id',$user_id)
        ->get(['subjects.subject_name','subjects.id']);
        return view('doctor\addExaQues', compact('professor_subjects'));

    }
    public function subjectAddQues($id)
    {
        $subjects=Subject::find($id);
        $chapters=Chapter::where('subject_id',$id)->get();
        $questions=question::all();
        $categorie=Category::all();
        
        return view('doctor\addQuestionForSub', compact('subjects','questions','chapters','categorie'));
    }
    public function subjectAddQuTF($id)
    {
        $subjects=Subject::find($id);
        $chapters=Chapter::where('subject_id',$id)->get();
        $quest_t_fs=quest_t_f::all();
        $categorie=Category::all();
       
        return view('doctor\addQTF', compact('subjects','quest_t_fs','chapters','categorie'));
    }

    public function addQuestionTf(Request $request,$id)
    {
       
        quest_t_f::create([
            
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'op_true' => $request->questionOptionTrue,
            'op_false' => $request->questionOptionFalse,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,
            'chapter_id' => $request->chapter_id,
            'subject_id'=>$id,

        ]);
        return redirect()->back()->with(['success' => 'Question Added Successfully!']);


    }

    public function viewEQuestionTf($id)
    {

        $questions =quest_t_f::where('subject_id',$id)->get();
        return view('doctor.viewQuestionTf',compact('questions'));
    }
    public function ViewQuesTf($idQ,$idS,$idCh,$idC)
    {
        $questions=quest_t_f::find($idQ);
        $subjects=Subject::where('id',$idS)->get();
        $chapters=Chapter::where('id',$idCh)->get();
        $categorie=Category::where('id',$idCh)->get();

        return view('doctor\ViewQuestSubTf',compact('questions','subjects','chapters','categorie'));
    }
    


    public function editQuestionTf($idQ,$idS)
    {
        $exams = quest_t_f::find($idQ);
        $exams = quest_t_f::where('id', $idQ)->get();
        $chapters=Chapter::where('subject_id',$idS)->get();
        $categorie=Category::all();
        return view('doctor\editQuestionsTf', compact('exams','categorie','chapters'));

    }

    public function updateQuestionTf($idQ,$idS,Request $request)
    {

        $exam = quest_t_f::find($idQ);
        $exam->update([
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'op_true' => $request->questionOptionT,
            'op_false' => $request->questionOptionF,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,
            'chapter_id' => $request->chapter_id,
            'subject_id' => $idS,
        ]);
        return redirect()->back()->with(['success' => 'Question Updated Successfully!']);
    }

    public function destroyQuesTF($id)
    {

        $questions = quest_t_f::find($id);
        if (!$questions) {
            return redirect()->back()->with(['error' => 'questions not found']);

        }
        $questions->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);
      
    }
  
    public function addQuestion(Request $request,$id)
    {
       
        Question::create([
            
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,
            'chapter_id' => $request->chapter_id,
            'subject_id'=>$id,

        ]);
        return redirect()->back()->with(['success' => 'Question Added Successfully!']);


    }

   public function  storeExamStruc($idE,$idS,Request $request)
   {
       Exam_structure::create([
            
        'exam_id' => $idE,
        'subject_id' => $idS,
        'chapter_number' => $request->chapter,
        'num_of_question' => $request->num_of_question,
        'category_id' => $request->category,
        'question_type'=> $request->type,
    ]);


    return redirect()->back()->with(['success' => 'Question Added Successfully!']);




   }



    public function viewEQuestion($id)
    {
        $questions =question::where('subject_id',$id)->get();
        return view('doctor.viewQuestions',compact('questions'));
    }
   
    public function editQuestion($idQ,$idS)
    {
        $exams = Question::find($idQ);
        $exams = Question::where('id', $idQ)->get();
        $chapters=Chapter::where('subject_id',$idS)->get();
        $categorie=Category::all();
        return view('doctor\editQuestions', compact('exams','categorie','chapters'));

    }

    public function updateQuestion($idQ,$idS,Request $request)
    {
        $exam = Question::find($idQ);
        $exam->update([
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,
            'chapter_id' => $request->chapter_id,
            'subject_id' => $idS,
        ]);
        return redirect()->back()->with(['success' => 'Question Updated Successfully!']);
    }


    public function results()
    {

        return view('doctor.results');
    }

    public function viewQuestions(Request $request)
    {
        $questions = Question::where('onlineExam_id', $request->id)->select('id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'category', 'answer_option')->get();
        return view('doctor\viewQuestions', compact('questions'));
    }

    public function chapters()
    {
        $user_id=auth()->user()->id;
        $subjects=Professor_subject::join('users','users.id','=','professor_subjects.professor_id')
        ->join('subjects','subjects.id','=','professor_subjects.subject_id')
        ->where('professor_id',$user_id)
        ->get(['subjects.subject_name','subjects.id']);
        
        $chapters = Chapter::all();
        return view('doctor\addChapters', compact('chapters', 'subjects'));
    }

    public function savedChapters(Request $request)
    {


        $request->input('names');

        Chapter::create([
            'describe_chapter' => $request->describe_chapter,
            'chapter_name' => $request->chapter_name,
            'subject_id' => $request->subject_id,

        ]);

        return redirect()->back()->with(['success' => 'Added Successfully']);

    }

    public function editchapters($id)
    {
        $chapters = Chapter::find($id);
        $subjects = Subject::all();
        return view('doctor\editChapter', compact('chapters', 'subjects'));
    }

    public function Updatechapters(Request $request, $id)
    {
        $chapters = Chapter::find($id);
        $chapters->subject_id = $request->input('subject_id');
        $chapters->chapter_name = $request->input('chapter_name');
        $chapters->describe_chapter = $request->input('describe_chapter');
        $chapters->update();
        return redirect()->back()->with('status', 'chapters Updated Successfully');

    }

    public function destroyChapters($id)
    {

        $chapters = Chapter::find($id);
        if (!$chapters) {
            return redirect()->back()->with(['error' => 'chapters not found']);

        }
        $chapters->delete();
        return redirect()->back()->with(['success' => 'Deleted Successfully']);
      
    }

   

 
   

   

}
