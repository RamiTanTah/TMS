<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\WorkspaceRequest;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
 
    public function index(){
        $workspaces = Workspace::paginate(5);
        
        return view('workspace.index',compact('workspaces'));
    }

    
    public function create(){
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
        $workspace = Workspace::find($id);
        $users = User::where('role_id', 4)
      ->where('account_status_id', 1)->get();
        return view('workspace.show',compact(['workspace','users']));
    }


    public function edit($id)
    {
        //
    }


    public function update(WorkspaceRequest $request, $id)
    {
      $data=request()->except(['_token','_method']);
      $result = array_filter($data);
      
      Project::where('id',$id)->update($result);
      return redirect()->route('workspace.show',[$id])->with(['success' => 'the Member added successfully']);

    }

    
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
