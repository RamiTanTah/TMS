<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;

class AdminController extends Controller
{
    public function home(){
      
      $workspaces=Workspace::all();
      return view('admin.home',compact('workspaces'));
    }

    public function test(){
      $workspaces=Workspace::with(['projects','users'])->get();
      
      return $workspaces;
    }

    public function adminHome(){
      $workspaces=Workspace::with(['projects','users'])->get();
      return view('admin.partials.adminContent',compact('workspaces'));
    }


}
