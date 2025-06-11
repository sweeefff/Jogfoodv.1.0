<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
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
