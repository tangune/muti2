<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
         if (auth()->check() && user()->admin == 0) {
            return redirect()->guest('home');
        }
        if (auth()->check() && user()->admin == 2) {
            return redirect()->guest('comissao');
        }
        return $next($request);
    }

    
}
