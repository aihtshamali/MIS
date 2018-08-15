<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          if(Auth::user()){
            if (Auth::user()->hasRole('directorevaluation')) {
              return redirect('/director_evaluation');
            }
            elseif(Auth::user()->hasRole('officer')) {
              return redirect('/officer');
            }
            else {
              return redirect('/dashboard');
              // code...
            }
        }
      }
        return $next($request);
    }
}
