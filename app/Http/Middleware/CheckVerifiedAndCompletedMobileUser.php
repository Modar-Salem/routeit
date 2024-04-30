<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVerifiedAndCompletedMobileUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user['verify']) {
            return response()->json([
                'message' => 'The account is not verified.'
            ], 403);
        } else if (!$user['completed']) {
            return response()->json([
                'message' => 'The account is not completed.'
            ], 422);
        } else {
            return $next($request);
        }
    }
}
