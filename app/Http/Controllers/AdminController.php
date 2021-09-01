<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;
use App\Models\TaskStatus;
use App\Models\ProjectStatus;

class AdminController extends Controller
{
    public function home()
    {
        $workspaces=Workspace::all();
        $project_statuses = ProjectStatus::all();
        $task_statuses = TaskStatus::all();
        return view('admin.home', compact(['workspaces','task_statuses','project_statuses']));
    }

    public function test()
    {
        $workspaces=Workspace::with(['projects','users'])->get();
      
        return $workspaces;
    }

    public function adminHome()
    {
        $workspaces=Workspace::with(['projects','users'])->get();
        return view('admin.partials.adminContent', compact('workspaces'));
    }
}
