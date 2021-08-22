<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
];

public $timestamps = true;


    // ### validation rules ###
    // ### we use it with WorkspaceRequest ###
    public const VALIDATION_RULES = [
      'name'  => [
                  'required'  ,
                  'string'    ,
                  'max:255'   ,
                  'min:'     ,
                  'unique:workspaces',
      ]
    ];

    // ### relation with ###
    /**
     * The users that belong to the Workspace
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'workspace_user', 'user_id', 'workspace_id');
    }
    


}
