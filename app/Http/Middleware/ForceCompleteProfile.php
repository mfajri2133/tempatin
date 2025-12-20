<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceCompleteProfile
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if (auth()->user()->password === null) {

            if (! $request->routeIs('profile.setup')) {
                return redirect()->route('profile.setup');
            }
        }

        return $next($request);
    }
}
