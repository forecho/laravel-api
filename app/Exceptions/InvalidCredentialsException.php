<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidCredentialsException extends HttpException
{
    public function __construct(
        $message = null,
        $code = ErrorCodes::INVALID_CREDENTIALS,
        $statusCode = Response::HTTP_UNAUTHORIZED,
        ?\Exception $previous = null,
        array $headers = []
    ) {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
