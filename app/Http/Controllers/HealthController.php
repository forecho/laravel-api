<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            Log::error('connect-fail', ['type' => 'mysql', 'exception' => (string)$e]);
        }

        return response()->json([
            'status' => $status,
            'data' => $data,
        ]);
    }
}
