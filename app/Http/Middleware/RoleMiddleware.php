<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        if (!Auth::check() || !$request->user()->hasAnyRole($roles)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
