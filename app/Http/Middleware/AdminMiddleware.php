<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/auth/login')
                ->with('error', 'Please sign in to continue.');
        }

        if (!Auth::user()->is_admin) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
