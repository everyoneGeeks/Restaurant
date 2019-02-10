<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Chef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }

        

        return $next($request);
    }
}
