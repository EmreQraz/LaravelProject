<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!auth()->user()->hasAnyRole($roles)) {
            abort(403, 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}

