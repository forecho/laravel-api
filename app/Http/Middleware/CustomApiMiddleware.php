<?php

namespace App\Http\Middleware;

use Closure;
use Forecho\LaravelTraceLog\TraceLog;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (! $response instanceof \Illuminate\Http\JsonResponse) {
            return $response;
        }
        if ($response->status() == Response::HTTP_FOUND) {
            return $response;
        }
        $content = json_decode($response->getContent(), true);
        if (data_get($content, 'code') && data_get($content, 'message')) {
            return $response;
        }

        return response([
            config('tracelog.trace_id_header_key') => TraceLog::getTraceId(),
            'code' => 0,
            'data' => $content,
            'message' => 'ok',
        ]);
    }
}
