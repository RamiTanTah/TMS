<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectToHome
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
      if(Auth::check()){
        ### Admin role === 1 to redirect admin to home page
        if(Auth::user()->role_id == 1){
          return redirect()->route('admin.home');
        }
      }
        return $next($request);
    }
}
