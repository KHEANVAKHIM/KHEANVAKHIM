<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $age = session('age');

        if (!is_numeric($age) || $age < 18) {
            // Có thể trả về view, JSON hoặc redirect
            return response("Không được phép truy cập", 403);
        }

        return $next($request);
    }
}
