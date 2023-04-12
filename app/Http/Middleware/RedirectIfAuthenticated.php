<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(
        Request $request,
        Closure $next,
        string $guard = null
    ): mixed {
        if (auth()->check()) {
            $user = auth()->user();
            return $user->redirectToDashboard();
        }

        return $next($request);
    }
}
