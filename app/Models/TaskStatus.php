<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $table='task_statuses';
    public $timestamp = false;

    // ### relations ###
    // every task_status have many tasks
    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_id');
    }
}
