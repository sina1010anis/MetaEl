<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() and auth()->user()->role_id == 1){
            return $next($request);
        }
        return redirect()->route('/user/home');
        
    }
}
