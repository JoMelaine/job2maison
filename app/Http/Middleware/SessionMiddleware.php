<?php

namespace App\Http\Middleware;
use Closure;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SessionMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next){
        if (!$request->session()->get('code')) {
            return redirect('login');
        }

        return $next($request);
    }
}
