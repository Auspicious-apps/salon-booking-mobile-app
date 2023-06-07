<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        } elseif (Auth::user()->user_type == 1) {
            return redirect()->route('admin');
             
        } elseif (Auth::user()->user_type == 2) {
            return $next($request);
        } else {
            
            return redirect()->route('register');
        }
    }
}
