<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidArgumentException extends HttpException
{
    public function __construct(
        $message = null,
        $code = ErrorCodes::INVALID_ARGUMENT_ERROR,
        $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY,
        ?\Exception $previous = null,
        array $headers = []
    ) {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
