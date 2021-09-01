<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\Project;
use App\Models\TaskStatus;
use App\Models\SubTask;

class Task extends Model
{
  use SoftDeletes;

  protected $table = 'tasks';

  protected $fillable = [
  'name',
  'description',
  'start_date',
  'end_date',
  'deadline',
  'estimite_time',
  'task_status_id',
  'project_id',
  'created_at',
  'updated_at',
];



  protected $hidden = [
'created_at',
'updated_at',
'pivot'
];

  public $timestamps = true;


  // ### relation with ###
  
  //  ### The users that belong to the Workspace
  // fK:project_id,user_id
  public function users()
  {
      return $this->belongsToMany(User::class, 'task_user')->withTimestamps();
  }
  
  public function task_status()
  {
      return $this->belongsTo(TaskStatus::class, 'task_status_id');
  }

  public function project()
  {
      return $this->belongsTo(Project::class, 'project_id');
  }

  public function sub_tasks()
  {
      return $this->hasMany(SubTask::class);
  }
  

  // ### validation rules ###
  // ### we use it with WorkspaceRequest ###
  public const VALIDATION_RULES = [

    'name'  => [
                'required'  ,
                'string'    ,
                'max:50'   ,
                'min:3'     ,
    ],
      'description' => [
        'string'  ,
        'max:500' ,
        'nullable' ,
      ],
      'start_date' => [
        'date',
        'before_or_equal:end_date',
        'nullable' ,
      ],
      'end_date' => [
        'date',
        'after_or_equal:start_date',
        'nullable' ,
      ],
      'deadline' => [
        'date',
        'nullable' ,
      ],
      'estimite_time' => [
        'date',
        'nullable' ,
      ],
      'task_status_id' => [
        'required'    ,
        'numeric'     ,
      ],
      'project_id' => [
        'required'    ,
        'numeric'     ,
      ],
    ];
}
