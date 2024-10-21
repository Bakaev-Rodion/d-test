<?php

namespace App\Http\Middleware;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermitProductManipulation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        switch (auth()->user()->role_id){
            case Role::ROLE_ADMIN:
                return $next($request);
            case Role::ROLE_TEAMLEAD:
                if(User::find(auth()->id())->team_id == Product::find($request->id)->user->team_id)
                    return $next($request);
                abort(403, 'Access denied');
            case Role::ROLE_BUYER:
                if(auth()->id() == Product::find($request->id)->user_id)
                    return $next($request);
                abort(403, 'Access denied');
            default:
                abort(403, 'Access denied');
        }
    }
}
