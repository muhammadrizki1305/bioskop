<?php

namespace App\Http\Middleware;

use Closure;

class filter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role_id)
    {
        if (\Auth::check()) {

            if (\Auth::user()->role_id == 3) {

                return \Redirect::to('/');
            }

            return $next($request);
        }
        
        return \Redirect::to('/');
    }
}
