<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorCodes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function success(array|string $result): JsonResponse
    {
        return response()->json($result, Response::HTTP_OK);
    }

    public function fail(string $message = '', int $code = ErrorCodes::INTERNAL_ERROR, $data = ''): JsonResponse
    {
        $response = [
            'code' => $code,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
