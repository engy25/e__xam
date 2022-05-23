<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\admin;
use App\Models\User;
use App\Models\Department;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Online_exam;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\LevelRequest;
use App\Http\Requests\DepartmentsRequest;
use App\Http\Requests\SubjectRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Professor_subject;
use App\Models\Temp_professor;

class AdminController extends Controller
{
   
  
    public function dashboard()
    {
        $countStudent=User::where('role_id',3)->count();
        $countDoctor=User::where('role_id',2)->count();
        $countExam=Online_exam::count();
        return view('admin/dashboard',compact('countStudent','countDoctor','countExam'));
       
    }
    public function login()
    {
        return view('auth\login');
       
    }
    public function changepasswords()
    {
       
        return view('auth\changePassword');
       
    }
    
    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        
        $user = User::where('role_id',1)->first();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function departments()
    {
        $departments= Department::all();
        return view('admin\addDepartments',compact('departments'));
       
    }
    public function savedDepartments(DepartmentsRequest $request)
    { 
       
         Department::create([
                
             'department_name' => $request->department_name,
                
            'id' => $request->id,
               
            ]);
          
           
        return redirect()->back()->withErrors(['success'=>"Addes Successfully"]);
                  
                }

    public function editDepartments( $department_id)
     {
        
         $departments = Department::find($department_id);  

             
        return view('admin\editDepartment', compact('departments',));

         }

    public function Updatedepartment(DepartmentsRequest $request, $department_id)
   {
       $departments = Department::find($department_id);
       $departments->department_name = $request->input('department_name');
        $departments->update();
    return redirect()->back()->with(['success' => 'departments Updated Successfully!']);
       
       
   }
 
   public function levels()
    {
    $levels= Level::all();
    $departments=Department::all();
    return view('admin\addLevels',compact('levels','departments'));
                    
    }

    public function AddDoctor()
    {
    $levels=Level::all();
    $departments=Department::all();
    $users=User::all();
  
    return view('admin\CreateTeacher', compact('users','departments','levels'));
    }


    public function CreateNewDoct(AdminRequest $request)
    { 

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->role_id =2;
        $user->password = \Hash::make($request->password);
        $user->level_id = $request->level;
        $user->department_id = $request->department;
        $user->verified = 1;
  
        if( $user->save() ){

            return redirect()->back()->with('success','You are now successfully registerd');
         }else{
             return redirect()->back()->with('error','Failed to register');
         }
                
     }

    public function savedLevels(LevelRequest $request)
    { 

        Level::create([
                
            'level_name' => $request->level_name,
                       
             'level_id' => $request->level_id,
                      
                ]);
                   
           return redirect()->back()->with(['success'=>'Added Successfully']);
                         
            }

     public function destroyLevel($level_id )
    {
        
  
        $levels = Level::find($level_id);
        if(!$levels)
        {
            return redirect() ->back() ->with(['error' =>'level not found']);

        }
        $levels->delete();

        return redirect()->route('adminLevels')
        ->with(['success'=>'levels deleted successfully']);
    }



    public function editLevels($level_id)
{

    $levels = Level::find($level_id);  
    return view('admin\editLevel', compact('levels'));

}
public function Updatelevel(LevelRequest $request, $level_id)
   {
      
       $levels = Level::find($level_id);
      
       $levels->level_name= $request->input('level_name');
       $levels->update();
       return redirect()->back()->with('status','levels Updated Successfully');
   }

    public function destroyDepartment($id )
     {
  
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
        $departments= Department::all();
        $levels= Level::all();
        $subjects= Subject::all();
        return view('admin\addSubjects',compact('departments','levels','subjects'));

    }

    public function saveSubjects (SubjectRequest $request)
    {
        $request->input('names');
       
        Subject::create([
          
            'level_id' => $request->level_id,
            'subject_name' => $request->subject_name,
            'subject_id' => $request->subject_id,
            'department_id' => $request->department_id,
    
           
        ]);
        
        return redirect()->back()->with(['success'=>'Added Successfully']);
       
    }
    public function destroySubject($id )
    {
  
        $subjects = Subject::find($id);
        if(!$subjects)
        {
            return redirect() ->back() ->with(['error' =>'subjects not found']);

        }
        $subjects->delete();

        return redirect()->route('adminSubjects')
        ->with(['success'=>'subjects deleted successfully']);
    }
    public function editSubjects($subject_id)
    {
        $subjects = Subject::find($subject_id);
        $departments= Department::all();
        $levels= Level::all(); 
        return view('admin\editSubject', compact('subjects','departments','levels'));
    }

    public function Updatesubject(SubjectRequest $request, $subject_id)
       {
       $departments= Department::all();
        $levels= Level::all();
    
           $subjects = Subject::find($subject_id);         
           $subjects->subject_name = $request->input('subject_name');
         
           $subjects->department_id = $request->input('department_id');
           $subjects->level_id = $request->input('level_id');
         
        $subjects->update();
        return redirect()->back()->with('status','subject Updated Successfully');

    }

    public function DoctorSubject()
    {
        $users= User::where('role_id',2)->get();
        $subjects= Subject::all();
        
        $professor_subjects=Professor_subject::join('users','users.id','=','professor_subjects.professor_id')
        ->join('subjects','subjects.subject_id','=','professor_subjects.subject_id')
        ->get(['subjects.subject_name','users.email','subjects.subject_id']);
        return view('admin\addSubjectsForDoctor',compact('users','subjects','professor_subjects'));

    }

  public function editsubjectDoctor($professor_id)
   {
   
    $professor_subjects=Professor_subject::find($professor_id);
    $subjects =$professor_subjects->subject; 
    $users =$professor_subjects->professor; 
    return view('admin\editSubjectDoctor', compact('subjects','users','professor_subjects'));
   }
    public function UpdatesubjectDoctor(Request $request, $professor_id)
    {
    $professor_subjects = Professor_subject::find($professor_id);
    $professor_subjects ->email = $request->get('email');
    $professor_subjects ->subject_name = $request->get('subject_name');
    $professor_subjects->update();
     return redirect()->back()->with('status','subjects of doctor Updated Successfully');

 }
 
    public function savedDoctorSubject(Request $request)
    { 
        Professor_subject::create([ 
                
            'professor_id' => $request->professor_id,
            
            'subject_id' => $request->subject_id,
           
        ]);
        return redirect()->back()->with(['success'=>'Added Successfully']);
        
     }

    public function pendingTeacher()
    {
        $userDoctors=User::where('verified', "=", 0 )->get();
        
           

        return view('admin\pendingTeacher',compact('userDoctors'));
       
    }
   
    public function teacherSubjects(Request $request)
    { 
        $dapartments=Department::all();
        $levels=Level::all();
        $subjects=Subject::all();
        
        $professor=Professor_subject::all();
        return view('admin\teacherSubjects',compact('dapartments','levels','subjects','professor'));
       
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
        return view('admin\totalTeacher',compact('userDoctors'));
      
    }
////delete from total teacher

public function destroy( $id)
    {
  
        $userDoctors = User::find($id);
        if(!$userDoctors)
        {
            return redirect() ->back() ->with(['error' =>'doctor not found']);

        }
        $userDoctors->delete();

        return redirect()->route('adminTotalTeacher')
        ->with(['success'=>'doctor deleted successfully']);
    }

    public function ViewProfileOfDoctor($id)
    {
        $userDoctors=User::find($id);
        $subDoctors=Professor_subject::join('users','users.id','=','professor_subjects.professor_id')
        ->join('subjects','subjects.subject_id','=','professor_subjects.subject_id')
        ->where('professor_subjects.professor_id',$id)
        ->get(['subjects.subject_name','users.email','subjects.subject_id','subjects.level_id','subjects.department_id']);
       
        return view('admin\viewProfileDoctor',compact('userDoctors','subDoctors'));
    }

    public function ViewProfileStudent($id)
    {
       
        $userStudents=User::find($id);
        return view('admin\viewProfileStudent',compact('userStudents'));
    }
    
    
    public function totalStudents()
    {
        $students=User::where('role_id',3)->get();
        return view('admin\totalStudents',compact('students'));
       
    }
    
    public function destroyStudent($id )
    {
        $students = User::find($id);
        if(!$students)
        {
            return redirect() ->back() ->with(['error' =>'students not found']);

        }
        $students->delete();

        return redirect()->route('adminTotalStudents')
        ->with(['success'=>'totalStudents deleted successfully']);
    }
    public function allExams()
    {
    
        return view('admin\allExams');
       
    }
    
    public function approve($id)
    {
        $Admin=User::where('role_id',1)->get();
        $userDoctors = User::find($id);
        // make $user->verified = 1
        $userDoctors->verified = 1;
        $userDoctors->update() ;
        return redirect()->back()->with(['userDoctors' => $userDoctors,'Admin' => $Admin]);

    }
    public function destroypendingTeacher($id)
    {
        $userDoctors = User::find($id);
        if(!$userDoctors)
        {
            return redirect() ->back() ->with(['error' =>'doctor not found']);

        }
        $userDoctors->delete();

        return redirect()->route('adminPendingTeacher')
        ->with(['success'=>'doctor deleted successfully']);

    }

}
