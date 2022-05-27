<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Department;
use App\Models\Level;
use App\Models\Online_exam;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
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

        $subjects = Subject::select('subject_name')->get();
        $levels = Level::select('level_name')->get();
        $chapters = Chapter::select('chapter_name')->get();
        $departments = Department::select('department_name')->get();


        return view('doctor\addExam', compact('subjects', 'levels', 'departments'));
    }

    public function viewExam()
    {

        $user_id = auth()->user()->id;
        $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name', 'onlineExam_duration', 'total_questions', 'onlineExam_marks', 'onlineExam_pass', 'onlineExam_datetime')->get();
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
            'category' => $request->questionCategory,
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
            'category' => $request->questionCategory,

        ]);
        return redirect()->back()->with(['success' => 'Question Added Successfully!']);

    }

    protected function getRulesQuestions()
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

    protected function getMessagesQuestions()
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

    protected function getRulesExam()
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

    protected function getMessagesExam()
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

    /*public function assignExam()
        {

            $user_id = auth()->user()->id;
            $exams = Online_exam::where('user_id', $user_id)->select('id', 'onlineExam_name')->get();
            return view('doctor.assignExam',compact('exams'));
        }

        public function sendExam(){
            return 'Exam Assigned Successfully!';
        }*/

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
