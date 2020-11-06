<?php

namespace App\Http\Middleware;
use Closure;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;

class EmployerMiddleware
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

        if ($request->session()->get('type') == 1) {
            return redirect('/candidate/showinfo');
        }

        return $next($request);
    }
}
