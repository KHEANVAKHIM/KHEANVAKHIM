<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon:: now();
        $start =  Carbon::parse('08:00:00');
        $end =  Carbon::parse('17:00:00');
        if (!$now->between($start, $end)){  
            return response()->json(['message' => 'Access denied. You can only access this application between 08:00 and 17:00. Current time: ' . $now->format('H:i:s')], 403);
        }
        return response()->json(['message' => 'Access denied. You can only access this application between 08:00 and 17:00. Current time: ' . $now->format('H:i:s')], 403);
    }
}