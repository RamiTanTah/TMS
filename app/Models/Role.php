<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Role extends Model
{
  protected $table = "roles";
  public $timestamp = false;
  
  // ### relation with user ###
  // every role have many user 
  
  public function users(){
    return $this->hasMany(User::class,'user_id');
  }


  
}
