<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
  public function users()
  {
      return $this->belongsToMany(User::class, 'project_user')->withTimestamps();
  }


  public function workspace()
  {
      return $this->belongsTo(Workspace::class, 'workspace_id');
  }
  

  public function project_status()
  {
      return $this->belongsTo(ProjectStatus::class, 'project_status_id');
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
      'project_status_id' => [
        'numeric'     ,
      ],
      'workspace_id' => [
        'required'    ,
        'numeric'     ,
      ],
    ];
}
