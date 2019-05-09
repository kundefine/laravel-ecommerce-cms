<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if(auth()->check()) {
            $uesr_type = auth()->user()->user_type;
            if($uesr_type === "admin") {

            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }






        return $next($request);
    }
}
