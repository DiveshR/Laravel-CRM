<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role_id != Role::ROLE_ADMIN){
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
