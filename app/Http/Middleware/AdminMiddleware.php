<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has an associated MasterUser record with the role of 'Admin'
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Redirect if not admin
        return redirect('/dashboard')->withErrors('You do not have access to the admin section.');
    }
}
