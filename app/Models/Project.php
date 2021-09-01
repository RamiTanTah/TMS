<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Workspace;
use App\User;
use App\Models\ProjectStatus;
use App\Models\Task;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';
  
    protected $fillable = [
    'name',
    'description',
    'start_date',
    'end_date',
    'deadline',
    'estimite_time',
    'project_status_id',
    'workspace_id',
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
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // ### validation rules ###
    // ### we use it with WorkspaceRequest ###
    public const VALIDATION_RULES = [

      'name'  => [
                  'required'  ,
                  'string'    ,
                  'max:50'   ,
                  'min:3'     ,
                  'unique:projects'
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
        'project_status_id' => [
          'required'    ,
          'numeric'     ,
        ],
        'workspace_id' => [
          'required'    ,
          'numeric'     ,
        ],
      ];
}
