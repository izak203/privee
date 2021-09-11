<?php

namespace App\Http\Middleware;

use Closure;

class CashierMiddleware
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
        if ($request->user() && ! $request->user()->subscribed('cashier')) {
            // This user is not a paying customer...
            return redirect('/');
        }

        return $next($request);
    }
}
