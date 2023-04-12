<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ar_can_access = [UserType::ADMIN, UserType::SUPER_MANAGER];

        if (!in_array(auth()->user()->type, $ar_can_access)) {
            auth()->logout();

            return redirect()
                ->route('login')
                ->with(
                    'errors',
                    'Введите email и пароль, для доступа в кабинет'
                );
        }

        return $next($request);
    }
}
