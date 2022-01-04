<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class userMiddleware
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
        if(Auth::check() && Auth::User()->role=='User'){
         return $next($request);
       }
       else{
        return redirect()->back();
       }
    }
}
