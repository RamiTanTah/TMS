<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
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
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users' , 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'firstName' => ['required', 'string', 'max:50','min:3'],
            'lastName' => ['required', 'string', 'max:50','min:3'],
            'DOB' => ['required', 'date',],

            // ### we add this by default value because when we create 
            // ### new Account (new user) we not have role and workspace yet
            // ### so now we comment this fields
            // 'role_id' => ['numeric'],
            // 'accountStatus_id' => ['required', 'numeric'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'DOB' => $data['DOB'],
            'role_id' => 4, // role = user by default
            'accountStatus_id' => 3,  // account_status = New by default
        ]);
    }

    // ### override register method --> laravel:Auth ###
    public function register(Request $request)
    {
        $val=$this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        
        return redirect()->back()->with('success','A new user account has been added successfully'); 
    }


}
