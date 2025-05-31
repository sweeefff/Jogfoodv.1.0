<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Manual session check
        if (!$request->session()->has('user_id') || !$request->session()->has('user_role')) {
            return redirect('/');
        }

        $userRole = $request->session()->get('user_role');
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
