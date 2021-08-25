<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Workspace;
use App\Models\ProjectStatus;
use App\Models\TaskStatus;
use App\Models\Task;
use App\Models\SubTask;

class ProjectController extends Controller
{
    // show all projects in All workspaces
    public function index()
    {
       $projects=Project::with(['tasks','users'])->get();
        return view('project.index',compact('projects'));
    }

    
    public function create()
    {
        $project_statuses = ProjectStatus :: all();
        $workspaces=Workspace::all();
  
        return view('project.create',compact(['workspaces','project_statuses']));
    }

    
    // store project
    public function store(Request $request)
    {
      $project = new Project;
      $project->name = $request -> name;
      $project->description = $request -> description;
      $project->start_date = $request -> start_date;
      $project->end_date = $request -> end_date;
      $project->estimite_time = $request -> estimite_time;
      $project->project_status_id = $request -> status;
      $project->workspace_id = $request -> workspace;

      $project->save();

      return redirect()->back()->with(['success' => 'the project added successfully']);
    }



    public function show($id)
    {
        $project=Project::find($id);
        $task_statuses = TaskStatus::all();
        $task_toDo = Task::with('sub_tasks')->where('task_status_id',1)->get();
        $task_progress = Task::with('sub_tasks')->where('task_status_id',2)->get();
        $task_review = Task::with('sub_tasks')->where('task_status_id',3)->get();
        $task_complete = Task::with('sub_tasks')->where('task_status_id',4)->get();
        


        return view('project.show',compact(['project','task_statuses','task_toDo','task_progress',
      'task_review','task_complete']));
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
