<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->type == 'admin') {
            return $next($request);
        }

        return redirect()->route('unauthorized');
    }
}