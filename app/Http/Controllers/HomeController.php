<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\admin;
use App\Traits\photoTrait;
use App\Models\User;
use App\Models\Department;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Online_exam;
class HomeController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        return view('home');
    }
    
     
    
    public function dashboard()
    {
        //to get photo
       $Admin=User::where('role_id',1)->get();
        $countStudent=User::where('role_id',3)->count();
        $countDoctor=User::where('role_id',2)->count();
        $countExam=Online_exam::count();
        return view('admin/dashboard',compact('Admin','countStudent','countDoctor','countExam'));
       
    }

    
  
    
    public function login()
    {
        return view('auth\login');
       
    }
    
    public function changepassword()
    {
        return view('auth\passwords\changePassword');
       
    }
    
    public function forgetpassword()
    {
        
       echo 'kkk';
    }
   
    public function departments()
    {
        return view('admin\addDepartments');
       
    }
    public function subjects()
    {
        return view('admin\addSubjects');
       
    }
    public function pendingTeacher()
    {
        $Admin=User::where('role_id',1)->get();
        $userDoctors=User::where('role_id',2)->get();

        return view('admin\pendingTeacher',compact('userDoctors','Admin'));
       
    }
   
    public function teacherSubjects()
    {
        $Admin=User::where('role_id',1)->get();
        $userDoctors=User::where('role_id',2)->get();
        $dapartments=Department::all();
        $levels=Level::all();
        $subjects=Subject::all();
        return view('admin\teacherSubjects',compact('userDoctors','dapartments','levels','subjects','Admin'));
       
    }
    public function saveTeacherSubjects(Request $request)
    {
        $user = new User();
      //  $user->first_name = $request->first_name;
        $user->level_id = $request->level;
        $user->department_id = $request->department;
        $user->subject_id = $request->subject;
        if( $user->save() ){

             return view('admin\teacherSubjects');
         }else{
             return redirect()->back()->with('error','Failed to register');
         }
    }
    public function totalTeacher()
    {
        return view('admin\totalTeacher');
       
    }
    
    public function totalStudents()
    {
        return view('admin\totalStudents');
       
    }
  
    public function allExams()
    {
        return view('admin\allExams');
       
    }
    public function hasone()
    {
       // return view('admin\allExams');
       $user = User::find(2);
      return $user->Role;
      // return response()->json($user);

        
    }
    
   

    
}
