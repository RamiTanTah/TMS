<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\WorkspaceRequest;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workspaces = Workspace::all();
        return view('workspace.index',compact('workspaces'));
    }

    // create new workspace 
    public function create()
    {
        $users=$this->getNewUsersToWorkspace();
        return view('workspace.create', compact('users'));
    }

    

    // store workspace with users
    public function store(WorkspaceRequest $request)
    {
        $workspace = new Workspace;
        $workspace ->name = $request -> name;
        $workspace -> save();

        // check if the request have input 'manager' --> add it to workspace
        // and then change user role to manager
        if ($request -> has('manager')) {
            $userManager=User::find($request->manager);
            $workspace->users()->attach($userManager);

            // save the new role in Data base (and the role for manager is 3 )
            $userManager->role_id = 3;
            $userManager->save;
        }

        // check if the request have input 'members' --> add thier to workspace
        // and then change users role to employee
        if ($request -> has('members')) {
            $users=User::find($request->members);
            $workspace->users()->attach($users);

            // save the new role in Data base (and the role for employee is 2 )
            foreach ($users as $user) {
                $user -> role_id = 2;
                $user -> save();
            }
        }


        return redirect()->back()->with(['success' => 'the workspace is created successfuly']);
    }
  



    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    // ### additional functions ###
    // get users where they not belongs to any workspaces before
    public function getNewUsersToWorkspace()
    {
        $newUsers = User::where('role_id', 4)
      ->where('account_status_id', 1)->get();
        return $newUsers;
    } 
}
