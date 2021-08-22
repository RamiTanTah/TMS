<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use App\User;
use  Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


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

    // ####################################
    // # edit on default login controller #
    // ####################################

    // ### the user should be enter username and passowrd for use the system
    public function username(){
      return 'name';
    }

    // ### check if user account is active or not 
    // ### + we check what type of user for redirected to specefic route
    
    protected function authenticated(Request $request, $user)
    {
        // if ($user->account_status_id != 1) {
        //     Auth::logout();
        //     return redirect()->route('login')->with('message','Your Account is closed by Administrator');
        // }
        return redirect()->intended($this->redirectPath());
    }




    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }



}
