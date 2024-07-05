<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        if (!Auth::check()) {
            // The user is not logged in
            return redirect('/login');
        }

        $user = Auth::user();
        // dd($user->role);

        // Check if the user has any of the required roles
        if ($user->hasRole($roles)) {
            return $next($request);
        }

        abort(403);
    }
}
