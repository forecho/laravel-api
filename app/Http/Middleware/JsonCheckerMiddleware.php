<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidArgumentException;
use Closure;
use GuzzleHttp\Utils;
use Illuminate\Http\Request;

class JsonCheckerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (str_starts_with($request->getContent(), '{')) {
            try {
                Utils::jsonDecode($request->getContent());
            } catch (\Exception $e) {
                throw new InvalidArgumentException('Invalid json data');
            }
        }

        return $next($request);
    }
}