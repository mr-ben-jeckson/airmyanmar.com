<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/');
        }
        else{
            $user = Auth::user();
            if ($user->hasRole("Admin")){
                return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        return $next($request);
    }
}
