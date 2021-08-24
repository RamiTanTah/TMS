<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectStatus extends Model
{
    protected $table='project_statuses';
    public $timestamp = false;


    // ### relations ### 
    // every project_status have many project 
    public function projects() 
    {
        return $this->hasMany(Project::class, 'project_id');
    }
}
