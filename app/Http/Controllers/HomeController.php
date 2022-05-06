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
       
        $Admin=User::where('role_id',1)->get();
        return view('admin\addDepartments',compact('Admin'));
       
    }
    public function subjects()
    {

        //$doctor= Doctor::with('Hospital')->find(2);
       // $subjects= Subject::all();
       $levels=Level::all();
       $departments=Department::all();

        $Admin=User::where('role_id',1)->get();
        return view('admin\addSubjects',compact('Admin','levels','departments'));
       
    }
    public function pendingTeacher()
    {
        $Admin=User::where('role_id',1)->get();
        $userDoctors=User::where('role_id',2)->get();

        return view('admin\pendingTeacher',compact('userDoctors','Admin'));
       
    }
   
    public function teacherSubjects()
    {

        $profsub = Professor_subject::with('subject')->get();
        $profuser= Professor_subject::with('professor')->get();

        $Admin=User::where('role_id',1)->get();
       // $userDoctors=User::where('role_id',2)->get();
        $dapartments=Department::all();
        $levels=Level::all();
        $subjects=Subject::all();
        return view('admin\teacherSubjects',compact('userDoctors','dapartments','levels','subjects','Admin','profsub','profsub'));
       
    }
    public function saveTeacherSubjects(Request $request)
    {

        $user = new User();
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
        $userDoctors=User::where('role_id',2)->get();
        $Admin=User::where('role_id',1)->get();
        return view('admin\totalTeacher',compact('Admin','userDoctors'));
      
    }
////delete from total teacher

public function destroy( $id)
    {
        // check if doctor id exist
  
        $userDoctors = User::find($id);
        if(!$userDoctors)
        {
            return redirect() ->back() ->with(['error' =>'doctor not found']);

        }
        $userDoctors->delete();

        return redirect()->route('adminTotalTeacher')
        ->with(['success'=>'doctor deleted successfully']);
    }
    
    
    
    public function totalStudents()
    {
        $Admin=User::where('role_id',1)->get();
        $userDoctors=User::where('role_id',3)->get();
        return view('admin\totalStudents',compact('Admin','userDoctors'));
       
    }
  
    public function allExams()
    {
        $Admin=User::where('role_id',1)->get();
        return view('admin\allExams',compact('Admin'));
       
    }
    public function hasone()
    {
       // return view('admin\allExams');
       $user = User::find(2);
      return $user->Role;
      // return response()->json($user);

        
    }
    
   

    
}
