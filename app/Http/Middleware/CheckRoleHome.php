<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

// ### this test ###

class CheckRoleHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // ### here we use this middleware with auth middleware for 
      // ### redirect user to route specific dependent on role  

      // if(Auth::check()){
      //   $role=Auth::user()->role_id;

      //   // ### Admin role === 1
      //   if($role == 1)
      //     return redirect()->route('admin.home');
      // }

      // // ### other role you can go to this route 

      return $next($request);
    }
}
