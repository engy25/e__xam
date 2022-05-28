<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Department;
use App\Models\Level;
use App\Models\Online_exam;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Category;
use App\Models\User;
use App\Models\Professor_subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $exams = Question::find($id);
        $exams = Question::where('id', $id)->select('id', 'onlineExam_id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'answer_option', 'category')->get();
        return view('doctor\editQuestions', compact('exams'));

    }

    public function updateQuestions($id, Request $request)
    {

        $exam = Question::find($id);
        //$exam = Question::select('id','onlineExam_id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'answer_option', 'category')->find($id);
        /*$rules = $this->getUpdatedRulesExam();
        $messages = $this->getUpdatedMessagesExam();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }*/
        $exam->update([
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,
        ]);
        return redirect()->back()->with(['success' => 'Question Updated Successfully!']);
    }


    public function addQuestions()
    {
        $user_id = auth()->user()->id;
        $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name')->get();
        $chapters = Chapter::all();
        return view('doctor\addQuestions', compact('exams', 'chapters'));
    }

    public function insertQuestions(Request $request)
    {
        
        $rules = $this->getRulesQuestions();
        $messages = $this->getMessagesQuestions();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        Question::insert([
            'onlineExam_id' => $request->questionName,
            'question_title' => $request->questionTitle,
            'mark' => $request->questionMark,
            'option_one' => $request->questionOptionOne,
            'option_two' => $request->questionOptionTwo,
            'option_three' => $request->questionOptionThree,
            'option_four' => $request->questionOptionFour,
            'answer_option' => $request->questionAnswer,
            'category_id' => $request->category_id,

        ]);
        return redirect()->back()->with(['success' => 'Question Added Successfully!']);

    }

    protected function getRulesQuestions()
    {
        return $rules = [
            'questionName' => 'required',
            'questionTitle' => 'required',
            'questionMark' => 'required | max:100 | numeric',
            'category_id' => 'required',
            'questionOptionOne' => 'required',
            'questionOptionTwo' => 'required',
            'questionOptionThree' => 'required',
            'questionOptionFour' => 'required',
            'questionAnswer' => 'required',
        ];
    }

    protected function getMessagesQuestions()
    {
        return $messages = [
            'questionName.required' => 'This Field is required',
            'questionQuestion.required' => 'This Field is required',
            'questionMark.required' => 'This Field is required',
            'questionMark.max:100' => 'Question Mark must not Exceed 100',
            'questionMark.numeric' => 'This Field is required',
            'category_id.required' => 'This Field is required',
            'questionOptionOne.required' => 'This Field is required',
            'questionOptionTwo.required' => 'This Field is required',
            'questionOptionThree.required' => 'This Field is required',
            'questionOptionFour.required' => 'This Field is required',
            'questionAnswer.required' => 'This Field is required',
            'chapter_name.required' => 'This Field is required',
        ];

    }

    public function insertExam(Request $request)
    {
        
        //Validation Rules:
        /*
        $rules = $this->getRulesExam();
        $messages = $this->getMessagesExam();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        */
        Online_exam::Create
        ([
           
            'onlineExam_name' => $request->onlineExam_name,
            'onlineExam_marks' => $request->onlineExam_marks,
            'onlineExam_pass' => $request->onlineExam_pass,
            'onlineExam_datetime' => $request->onlineExam_datetime,
            'total_questions' => $request->total_questions,
            'onlineExam_duration' => $request->onlineExam_duration,
            'onlineExam_createBy' => auth()->user()->first_name,
            'subject_id'=>$request->subject_id,
        
        ]);
        return redirect()->back()->with(['success' => 'Exam Added Successfully!']);

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
    public function addQuestion(Request $request,$id)
    {
        /*
        $rules = $this->getRulesQuestions();
        $messages = $this->getMessagesQuestions();
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        */
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
    public function viewEQuestion($id)
    {
        $questions =question::where('subject_id',$id)->get();
        return view('doctor.viewQuestions',compact('questions'));
    }
    protected function getRulesExam()
    {
        return $rules = [
            'onlineExam_name' => 'required | unique:online_exams,onlineExam_name',
            'onlineExam_marks' => 'required | max:100 | numeric',
            'onlineExam_pass' => 'required | max:60 | numeric',
            'onlineExam_datetime' => 'required',
            'total_questions' => 'required | numeric',
            'onlineExam_createBy'=>'required',
            'onlineExam_duration' => 'required | numeric',
        ];
    }
    public function editQuestion($idQ,$idS)
    {
        $exams = Question::find($idQ);
        $exams = Question::where('id', $idQ)->get();
        $chapters=Chapter::where('subject_id',$idS)->get();
        $categorie=Category::all();
        return view('doctor\editQuestions', compact('exams'));

    }

    public function updateQuestion($id,Request $request)
    {

        $exam = Question::find($id);
        //$exam = Question::select('id','onlineExam_id', 'question_title', 'mark', 'option_one', 'option_two', 'option_three', 'option_four', 'answer_option', 'category')->find($id);
        /*$rules = $this->getUpdatedRulesExam();
        $messages = $this->getUpdatedMessagesExam();
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }*/
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
            'subject_id' => $request->subject_id,
        ]);
        return redirect()->back()->with(['success' => 'Question Updated Successfully!']);
    }
    protected function getMessagesExam()
    {
        return $messages = [
            'onlineExam_name.required' => 'This Field is required',
            'onlineExam_name.unique:online_exams,onlineExam_name' => 'Name should be Unique',
            'onlineExam_marks.required' => 'This Field is required',
            'onlineExam_marks.max:100' => 'Total Marks must not exceed 100',
            'onlineExam_marks.numeric' => 'Total Marks must be Numeric',
            'onlineExam_marks.required' => 'This Field is required',
            'onlineExam_marks.max:60' => 'Pass Mark must not exceed 60',
            'onlineExam_marks.numeric' => 'Pass Mark must be Numeric',
            'onlineExam_datetime.required' => 'This Field is required',
            'questionCount.required' => 'This Field is required',
            'total_questions.numeric' => 'Number of Questions must be Numeric',
            'onlineExam_duration.required' => 'This Field is required',
            'onlineExam_duration.numeric' => 'Duration of Exam must be Numeric',
            'onlineExam_createBy'=>'required',
        ];
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
        $subjects = Subject::all();
        $chapters = Chapter::all();
        return view('doctor\addChapters', compact('chapters', 'subjects'));
    }

    public function savedChapters(Request $request)
    {


        $request->input('names');

        Chapter::create([
            //'id' => $request->id,
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

        return redirect()->route('adminChapters')
            ->with(['success' => 'subjects deleted successfully']);
    }

    protected function getUpdatedRulesExam()
    {
        return $rules = [

            'question_title' => 'required',
            'mark' => 'required | max:100 | numeric',
            'category' => 'required',
            'option_one' => 'required',
            'option_two' => 'required',
            'option_three' => 'required',
            'option_four' => 'required',
        ];
    }

    protected function getUpdatedMessagesExam()
    {
        return $messages = [
            'question_title.required' => 'This Field is required',
            'mark.required' => 'This Field is required',
            'mark.max:100' => 'Question Mark must not exceed 100',
            'mark.numeric' => 'Question Mark must be Numeric',
            'category.required' => 'This Field is required',
            'option_one.required' => 'This Field is required',
            'option_two.required' => 'This Field is required',
            'option_three.required' => 'This Field is required',
            'option_four.required' => 'This Field is required',

        ];
    }

   

}
