<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageVisit;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests that return HTML (not assets, not AJAX)
        if ($request->isMethod('GET') && !$request->ajax() && !$request->expectsJson()) {
            // Skip asset URLs
            $path = $request->path();
            $skipPatterns = ['css/', 'js/', 'img/', 'assets/', 'vendor/', 'api/'];
            $shouldSkip = false;
            foreach ($skipPatterns as $pattern) {
                if (strpos($path, $pattern) === 0) {
                    $shouldSkip = true;
                    break;
                }
            }

            if (!$shouldSkip) {
                PageVisit::create([
                    'url' => $request->fullUrl(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'user_id' => $request->user() ? $request->user()->id : null,
                    'visited_at' => now(),
                ]);
            }
        }

        return $response;
    }
}