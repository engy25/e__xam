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
   

     //  ****************************Add Show Edit DELETE UPDATE DEPARTMENTS*********************
    public function departments()
    {
       
        $Admin=User::where('role_id',1)->get();
        $departments= Department::all();
        return view('admin\addDepartments',compact('Admin','departments'));
       
    }
    public function savedDepartments(Request $request)
    { 

            Department::create([
                
                'department_name' => $request->department_name,
                
                'department_id' => $request->department_id,
               
            ]);
            
            return redirect()->back()->with(['success'=>'Added Successfully']);
                  
                }
public function editDepartments(Department $department_id)
{

    $Admin=User::where('role_id',1)->get();
    $departments = Department::find($department_id);  // search in given table id only
    if (!$departments)
        return redirect()->back();
        
    return view('admin\editDepartment', compact('departments','Admin'));


}
public function Updatedepartment(Request $request, $department_id)
   {
       //validtion

       // chek if offer exists

       $departments = Department::find($department_id);
       if (!$departments)
    {
           return redirect()->back();
    }
       //update data

       $departments->update([
        'department_name' => $request->department_name,
        'department_id' => $request->department_id,

       
    ]);
    return redirect()->route('adminDepartments')
    ->with(['success'=>'departments updated successfully']);
   }


 public function levels()
    {
                    
     $Admin=User::where('role_id',1)->get();
    $levels= Level::all();
    return view('admin\addLevels',compact('Admin','levels'));
                    
    }

    public function savedLevels(Request $request)
    { 

      Level::create([
                
     'level_name' => $request->level_name,
                
      'level_id' => $request->level_id,
               
         ]);
            
    return redirect()->back()->with(['success'=>'Added Successfully']);
                  
     }

     public function destroyLevel($level_id )
    {
        // check if doctor id exist
  
        $levels = Level::find($level_id);
        if(!$levels)
        {
            return redirect() ->back() ->with(['error' =>'level not found']);

        }
        $levels->delete();

        return redirect()->route('adminLevels')
        ->with(['success'=>'levels deleted successfully']);
    }



    public function editLevels(Level $level_id)
{

    $Admin=User::where('role_id',1)->get();
    $levels = Level::find($level_id);  // search in given table id only
    if (!$levels)
        return redirect()->back();
        
    return view('admin\editLevel', compact('levels','Admin'));


}
public function Updatedlevel(Request $request, $level_id)
   {
       //validtion

       // chek if offer exists

       $levels = Level::find($level_id);
       if (!$levels)
    {
           return redirect()->back();
    }
       //update data

       $levels->update([
        'level_name' => $request->level_name,
        'level_id' => $request->level_id,

       
    ]);
    return redirect()->route('adminLevels')
    ->with(['success'=>'levels updated successfully']);
   }
public function destroyDepartment($id )
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
