<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // extends showLoginForm function from AuthenticateUsers
    public function showLoginForm()
    {
        $users = User::all();
        if(count($users)>0){
            return view('admin.users.login-form');
            //return view('auth.login');
        }else{
              $user = new User();
              $user->role = 'Admin';
              $user->name = 'Admin';
              $user->mobile = '01700022222';
              $user->email = 'admin@gmail.com';
              $user->password = Hash::make(value(12345678));
              $user->save();
            return view('admin.users.login-form');
        }
        
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    // extends username function from AuthenticateUsers
    public function username()
    {
        return 'mobile';
       // return 'email';
    }
     /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    // extends loggedOut function from AuthenticateUsers
    protected function loggedOut(Request $request)
    {
         return redirect('/home');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
