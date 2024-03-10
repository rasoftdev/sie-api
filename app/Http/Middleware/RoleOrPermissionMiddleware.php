<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleOrPermissionMiddleware
{
    public function handle($request, Closure $next, $roleOrPermission)
    {
        if (Auth::user()->hasRole('Super Admin')) {
            return $next($request);
        }

        if (!Auth::user()->can($roleOrPermission)) {
            abort(403);
        }

        return $next($request);
    }
}
