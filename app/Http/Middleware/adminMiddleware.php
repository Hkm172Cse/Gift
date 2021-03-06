<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class adminMiddleware
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
       if(Auth::check() && Auth::User()->role=='Admin'){
         return $next($request);
       }
       else{
        return redirect()->back();
       }
       
    }
}
