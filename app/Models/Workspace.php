<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Project;

class Workspace extends Model
{
    protected $table = 'workspaces';
  
    protected $fillable = [
    'name',
    'created_at',
    'updated_at',
];

    protected $hidden = [
  'created_at',
  'updated_at',
  'pivot'
];

    public $timestamps = true;




  
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_workspace')->withTimestamps();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    // withPivot(['column'])


    // ### validation rules ###
    // ### we use it with WorkspaceRequest ###
    public const VALIDATION_RULES = [
      'name'  => [
                  'required'  ,
                  'string'    ,
                  'max:50'   ,
                  'min:3'     ,
                  'unique:workspaces',
      ]
    ];
}
