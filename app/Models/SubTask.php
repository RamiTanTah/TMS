<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Models\TaskStatus;
use App\Models\Task;
class SubTask extends Model
{
  use SoftDeletes;

  protected $table = 'sub_tasks';

  protected $fillable = [
  'name',
  'description',
  'start_date',
  'end_date',
  'deadline',
  'estimite_time',
  'task_statue_id',
  'task_id',
  'user_id',
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
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  public function task_status()
  {
      return $this->belongsTo(TaskStatus::class, 'task_status_id');
  }

  public function task()
  {
      return $this->belongsTo(Task::class, 'task_id');
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
      ],
      'start_date' => [
        'date',
      ],
      'end_date' => [
        'date',
      ],
      'deadline' => [
        'date',
      ],
      'estimite_time' => [
        'date',
      ],
      'task_status_id' => [
        'numeric'     ,
      ],
      'task_id' => [
        'required'    ,
        'numeric'     ,
      ],
      'user_id' => [
        'required'  ,
      ],
    ];
}
