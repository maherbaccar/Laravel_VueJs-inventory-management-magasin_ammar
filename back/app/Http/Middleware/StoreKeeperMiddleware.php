<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreKeeperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role_id == 2) {
            return $next($request);
        } else {
            return response(
                ['message' => 'you are not authorized to access to this route'],
                401
            );
        }
    }
}
