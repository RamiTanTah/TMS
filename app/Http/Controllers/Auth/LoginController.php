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

    public function username(){
      return 'name';
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->accountStatus_id != 1) {
            Auth::logout();
            return redirect('/login')->with('message','Your Account is closed by Administrator');
        }
        return redirect()->intended($this->redirectPath());
    }

    protected function redirectPath(){
        
        $role=Auth::user()->role_id;
        switch($role){
          case 1:
            $path=route('admin.home');
            break;
          case 2:
            $path=route('home');
            break;
          default:
          $path=route('login');
        }
        return $path;
    }



}
