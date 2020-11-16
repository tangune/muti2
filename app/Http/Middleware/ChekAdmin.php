<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ChekAdmin
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
        $userRoles = Auth::user()->roles->pluck('name');

        if (!$collection->contains('admin')) {
            
        }return redirect('/admin');

        return $next($request);
    }
}
