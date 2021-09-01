<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\User;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $task = new Task;
      $task->name = $request -> name;
      $task->description = $request -> description;
      $task->start_date = $request -> start_date;
      $task->end_date = $request -> end_date;
      $task->estimite_time = $request -> estimite_time;
      $task->task_status_id = $request -> status;
      $task->project_id = $request -> project_id;

      $task->save();

      if ($request -> has('members')) {
        $users=User::find($request->members);
        $task->users()->attach($users);
    }
    return redirect()->route('project.show',[$task->project_id])->with(['success' => 'The task added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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


    public function changeStatus($id){
      $task=Task::find($id);
      $task_statuses = TaskStatus::all();
      return view('task.changeStatus',compact(['task','task_statuses']));
    }

    public function updateStatus(Request $request,$id){
      // $task=Task::find($id);
      $data=request()->except(['_token','_method']);
      $result = array_filter($data);
      // return $request;
      Task::where('id',$id)->update($result);
      return redirect()->back()->with(['success' => 'the project edit successfully']);
    }
}
