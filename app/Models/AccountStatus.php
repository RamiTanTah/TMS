<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\User;

class AccountStatus extends Model
{
  protected $table = "account_status";

  protected $fillable=[
    'id' , 'name'
  ];

  public $timestamps = false;



  // ### relation with user ###
  // every account_status he have many user 
  
  public function users(){
    return $this->hasMany(User::class,'user_id');
  }

  
}
