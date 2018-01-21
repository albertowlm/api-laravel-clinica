<?php

namespace Clin\Http\Middleware;

use Closure;
use Tymon\JWTAuth\JWTAuth;

class TenantMiddlewere
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
        $user = \JWTAuth::parseToken()->toUser();
        \Landlord::addTenant($user); //AQUI QUE VOU COLOCAR O ADM
        return $next($request);
    }
}
