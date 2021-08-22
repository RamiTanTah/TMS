<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use App\Models\AccountStatus;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'name',
          'email',
          'password',
          'firstName',
          'lastName',
          'DOB',
          'role_id',
          'account_status_id',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    // ### validation rules ###
    // ### we use it with UserRequest ###
    public const VALIDATION_RULES = [
      'name'  => [
                  'required'  ,
                  'string'    ,
                  'max:255'   ,
                  'min:3'     ,
                  'unique:users',
      ],
      'email' => [
                  'required'  ,
                  'string'    ,
                  'email'     ,  
                  'max:255'   ,
                  'unique:users',
      ],
      'password' => [
                  'required'  , 
                  'string'    , 
                  'min:8'     , 
                  'confirmed' ,
      ],
      'firstName' => [
                  'required'    , 
                  'string'      , 
                  'max:50'      ,
                  'min:3'       ,
      ],
      'lastName' => [
                  'required'    , 
                  'string'      , 
                  'max:50'      ,
                  'min:3'       ,
      ],
      'DOB'     => [
                  'required'    , 
                  'date'        ,
      ],
      'role_id' => [
                  'required'    ,
                  'numeric'     ,
      ],
      'account_status_id' => [
                  'required'    , 
                  'numeric'     ,
      ],  
  ];


    // protected $with=['role'];

    // ########relation with user ########
    // ### every user he belongs to a one role in the system

    public function role(){
      return $this->belongsTo(Role::class,'role_id');
    }

    // ### every user he belongs to a one account_stauts in the system
    public function account_status(){
      return $this->belongsTo(AccountStatus::class,'account_status_id');
    }

    // ### some useful function ###
    public function getFullNameAttribute(){
      
      return "{$this->firstName} {$this->lastName}";
    }





      
}



