<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (Auth()->user()->role_id == 1) {
            return route('adminDashboard');
        } elseif (Auth()->user()->role_id == 2) {
            return route('doctorDashboard');
        } elseif (Auth()->user()->role_id == 3) {
            return route('studentDashboard');
        }

    }

    public function login(Request $request)
    {



        $input = $request->all();
        //to check email and pass
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'

        ]);
<<<<<<< HEAD

        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if(auth()->user()->role_id ==1 && auth()->user()->verified==1)
            {
                return redirect()->route('adminDashboard');
            }
           
            elseif(auth()->user()->role_id ==2 && auth()->user()->verified==1 )
            {
               return redirect()->route('doctorDashboard');
                
            }
            elseif(auth()->user()->role_id ==2 && auth()->user()->verified==0 )
            {
               return redirect()->route('login');
                
            }
            elseif(auth()->user()->role_id ==3)
            {
=======
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('adminDashboard');

            } elseif (auth()->user()->role_id == 2) {
                return redirect()->route('doctorDashboard');

            } elseif (auth()->user()->role_id == 3) {
>>>>>>> doctor
                return redirect()->route('studentDashboard');

            }
        } else {
            return redirect()->route('login')->with('error', 'Email and password are wrong');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
