<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\AccountStatus;
use App\User;

class UserController extends Controller
{
    // ### show All users ###
    public function index(){
        $users=$this->getAllUsers();
        
        return view('user.index',compact('users'));
    }

    // ###  view search page ###
    public function search(){
        return view('user.search');
    }

    // ### Displays the result of the search operation ###
    public function result(Request $request){
      $users=$this->searchInDB($request->q);
        // return $users;
      return view('user.index',compact('users'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user=$this->getUserByID($id);
      $account_statuses=$this->getAllAccountStatus();
      return view('user.edit',compact(['user','account_statuses'])); 
    }

    /** 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
      $user=$this->getUserByID($id);
        return view('User.profile',compact('user'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // return $request->account_status_id;
        $user=$this->getUserByID($id);
        
        $user->firstName          = ucwords($request->firstName);
        $user->lastName           = ucwords($request->lastName);
        $user->name               = $request->name;
        // Hash::make($data['password'])
        // $user->passowrd           = $request->passowrd;
        $user->email              = $request->email;
        $user->DOB                = $request->DOB;
        $user->role_id            = $request->role_id;
        $user->account_status_id   = $request->account_status_id;

        $user->save();
        return redirect()->back()->with(['success'=>'User information has been modified successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=$this->getUserByID($id);
        $user->delete();
        return redirect()->route('user.index')->with(['success' =>'User Account has been deleted successfully']);
    }

    // get all users from Database
    public function getAllUsers(){
      $users=User::all();
      return $users;
    }

    /**
     * @param string $keyword 
     * check in columns id,name,firstname,lastname
     */

    // ### searching for the user in the Database ###
    public function searchInDB($keyword){
      // ### check if the keyword is numeric for search in id column
      if(is_numeric($keyword)){
        
        $users=User::where('id',"$keyword")->get();
        
        return $users;
      }
      else{
        // ### else check in columns : name , firstname , lastname
         $users=User::where(function($query) use($keyword){
          $query->where('name','LIKE',"%$keyword%")
                ->Orwhere('firstName','LIKE',"%$keyword%")
                ->OrWhere('lastName','LIKE',"%$keyword%");})->get();
      }
      return $users;
    }


    public function getUserByID($id){
      return User::find($id);
    }

    public function getAllAccountStatus(){
      return AccountStatus::all();
    }

}
