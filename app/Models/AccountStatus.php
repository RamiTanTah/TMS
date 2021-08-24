<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\User;

class AccountStatus extends Model
{
  // just this field have like this name
  protected $table = "account_status";
  public $timestamps = false;



  // ### relation with user ###
  // every account_status he have many user 
  
  public function users(){
    return $this->hasMany(User::class,'user_id');
  }

  
}
