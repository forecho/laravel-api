<?php

namespace App\Traits;

use App\Exceptions\ErrorCodes;
use Forecho\LaravelTraceLog\TraceLog;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseAPI
{
    public function success(mixed $result): JsonResponse
    {
        return response()->json($result, Response::HTTP_OK);
    }

    public function fail(
        string $message = '',
        int $code = ErrorCodes::INTERNAL_ERROR,
        $data = '',
        int $status = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        $response = [
            config('tracelog.trace_id_header_key') => TraceLog::getTraceId(),
            'code' => $code,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $status);
    }
}
