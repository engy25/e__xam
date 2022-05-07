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
use App\Models\Professor_subject;
use App\Models\Tem_professor;
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
        $departments= Department::all();
        return view('admin\addDepartments',compact('Admin','departments'));
       
    }
    public function savedDepartments(Request $request)
    { 

        $request->validate([
            'department_name' => 'required',
            'department_id' => 'required',
            
            ]);
            $departments = new Department;
            $departments->department_name = $request->department_name;
            $departments->department_id = $request->department_id;

            if( $departments->save() ){

                return redirect()->back()->with('success','You are now successfully registerd');
             }else{
                 return redirect()->back()->with('error','Failed to register');
             }
       
}


public function editDepartments(Department $department)
{
    return view('admin\editDepartment',['department'=>$department]);

}

public function destroySubject($id )
    {
        // check if doctor id exist
  
        $departments = Department::find($id);
        if(!$departments)
        {
            return redirect() ->back() ->with(['error' =>'department not found']);

        }
        $departments->delete();

        return redirect()->route('adminDepartments')
        ->with(['success'=>'departments deleted successfully']);
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
   
    public function teacherSubjects(Request $request)
    {
        

        $professors=Professor::all();


        $Admin=User::where('role_id',1)->get();
       // $userDoctors=User::where('role_id',2)->get();
        $dapartments=Department::all();
        $levels=Level::all();
        $subjects=Subject::all();
        
        $professor=Professor_subject::all();
        return view('admin\teacherSubjects',compact('dapartments','levels','subjects','Admin','professor'));
       
    }
    public function saveTeacherSubjects(Request $request)
    {

        $professors = new Tem_professor();
        $professors->level_id = $request->level_id;
        $level_id->department_id = $request->department_id;
        $professor_subject=Professor_subject::all();
        $professor_subject->subject_id = $request->subject_id;
        if(($professors->save()) && ($professor_subject->save())){

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
