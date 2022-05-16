<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\photoTrait;
use App\Models\User;
use App\Models\Temp_professor;
use App\Models\Role;
use App\Models\Department;
use App\Models\Level;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use photoTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   use RegistersUsers;
    public function showRegistrationForm ()
    {
        $roles = Role::all();
        $departments = Department::all();
        $levels = Level::all();
        return view('auth\register',['roles' => $roles,'departments' => $departments,'levels' => $levels]);
    }

    public function showRegistrationFormForDoct ()
    {
        $roles = Role::all();
        $departments = Department::all();
        $levels = Level::all();
        return view('auth\registerDoct',['roles' => $roles,'departments' => $departments,'levels' => $levels]);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:250'],
            'mobile' => ['required', 'string','max:300'],
            'photo' => ['required', 'string', 'max:300'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required', 'integer'],
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */



/*

     public function register_page()
     {
         $role=Role::all();
         $department=Department::all();
         $level = Level::all();
         return view('auth\register')->with([
              'role' => $role,
              'department'=>$department,
              'level' =>$level,
         ]);
*/


     

    protected function create(array $data)
    {
        return User::create([
            'first_name'=> $data['first_name'],
            'last_name'=> $data['last_name'],
            'mobile'=> $data['mobile'],
            'photo'=> $data['photo'],
            'department_id'=> $data['department_id'],
            'level_id'=> $data['level_id'],
            'email' => $data['email'],
            'role_id' =>$data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }

    function register(Request $request){


        
/*
        $request->validate([
          'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:250'],
          //  'department_id' => ['integer', 'max:200'],
           //'level_id' => ['integer', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'role_id' => ['required', 'integer'],
           
           'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
         */
        // dd('here');
        $photo= $this->saveImage($request->photo,'images/users');

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->photo = $request->photo;
        $user->email = $request->email;
        $user->role_id =$request->role;
        $user->password = \Hash::make($request->password);
        $user->level_id = $request->level;
        $user->department_id = $request->department;
       if($request->role ==2)

       {
        $user->verified=0;
       }
       else{
        $user->verified=1;
         }
        

        if( $user->save() ){

            return redirect()->back()->with('success','You are now successfully registerd');
         }else{
             return redirect()->back()->with('error','Failed to register');
         }
        }

         
       


  


   

       




}
