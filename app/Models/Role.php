<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = "roles";

  protected $fillable=[
    'id' , 'name'
  ];


  // ### relation with user ###
  // every role he have many user 
  
  public function users(){
    return $this->hasMany('App\User','user_id');
  }


  
}
