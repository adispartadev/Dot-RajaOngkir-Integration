<?php

namespace App\Http\Middleware;

use App\Http\Helpers\Tools;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        if($user == null) {
            return Tools::jsonResponse('error', 'Unauthenticate', null, 401);
        }
        return $next($request);
    }
}
