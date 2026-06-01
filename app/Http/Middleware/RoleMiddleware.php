<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
             abort(403, 'Unauthorized action.'); // Block access with a 403 error
         }

        return $next($request);
    }
}
 

// Check if user is logged in and matches the required role
        // if(!Auth::check()){
        //     return redirect()->route('login'); // Redirect to login if not authenticated      
        // }
        // if(Auth::user()->role !== $role) {
        //     abort(403, 'Unauthorized action.'); // Block access with a 403 error
        // }
        // return $next($request);