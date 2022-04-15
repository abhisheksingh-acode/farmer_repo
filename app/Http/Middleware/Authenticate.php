<?php

namespace App\Http\Middleware;

use App\Models\Fcenter;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {

            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            }

            if ($request->routeIs('fcenter.*')) {
                return route('fcenter.login');
            }
            if ($request->routeIs('warehouse.*')) {
                return route('warehouse.login');
            }
            if ($request->routeIs('logistic.*')) {
                return route('logistic.login');
            }

            if ($request->routeIs('api.fcenter.*')) {
                return route('api.fcenter.login');
            }

            return route('login.index');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {

        if ($jwt = $request->cookie('jwt')) {
            $request->headers->set('Authorization', 'Bearer ' . $jwt);
        }

        $this->authenticate($request, $guards);

        return $next($request);
    }
}
