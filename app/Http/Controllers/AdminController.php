<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use resources\views\admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin\adminDashboard');
       
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
        return view('admin\pendingTeacher');
       
    }
   
    public function teacherSubjects()
    {
        return view('admin\teacherSubjects');
       
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

    public function countteacher()
    {
        $data= e_exam::table('users')->count();
        return $data($data);
    }
}
