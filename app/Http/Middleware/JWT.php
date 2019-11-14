<?php

namespace App\Http\Middleware;
use JWTAuth;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        JWTAuth::parseToken()->authenticate();
        return $next($request);
    }
}