<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
         if (!Auth::check()) {
            return redirect()->route('login');
        } else if (Auth::user()->user_type == 1) {
            return $next($request);
            
        } else if (Auth::user()->user_type == 2) {
            return redirect()->route('user');
        } else {
            
            return redirect()->route('register');
        }
    }
}
