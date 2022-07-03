<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Forecho\LaravelTraceLog\TraceLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function index(): JsonResponse
    {
        $status = 'healthy';
        $data = [];

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            $status = 'unhealthy';
            $data['mysql'] = 'Could not connect to the database.  Please check your configuration.';
            TraceLog::error('connect-fail', ['type' => 'mysql', 'exception' => (string) $e]);
        }

        return response()->json([
            config('tracelog.trace_id_header_key') => TraceLog::getTraceId(),
            'status' => $status,
            'data' => $data,
        ]);
    }
}
