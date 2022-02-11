<?php

namespace App\Exceptions;

use Forecho\LaravelTraceLog\TraceLog;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
        if (app()->bound('sentry') && $this->shouldReport($e)) {
            app('sentry')->captureException($e);
        }

        parent::report($e);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  Throwable  $e
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|Response
     */
    public function render($request, Throwable $e): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|Response
    {
        $message = $e->getMessage();
        $exceptionCode = $e->getCode() > 0 ? $e->getCode() : ErrorCodes::INTERNAL_ERROR;
        $statusCode = $this->getStatusCode($e);

        switch (true) {
            case $e instanceof ValidationException:
                $exceptionCode = ErrorCodes::INVALID_ARGUMENT_ERROR;
                /** @var ValidationException $e */
                $message = $e->validator->errors()->first();

                break;
            case $e instanceof ModelNotFoundException:
                $exceptionCode = ErrorCodes::RECORD_NOT_FOUND;
                $message = 'No query results';

                break;
            case $e instanceof QueryException:
                // SQL error
                $exceptionCode = ErrorCodes::INTERNAL_ERROR;
                if (!config('app.debug')) {
                    $exceptionCode = ErrorCodes::INTERNAL_ERROR;
                    $message = 'SQL error';
                }

                break;
            case $e instanceof AuthenticationException:
                $exceptionCode = ErrorCodes::UNAUTHENTICATED;
                $statusCode = Response::HTTP_UNAUTHORIZED;

                break;
            default:
                switch ($statusCode) {
                    case Response::HTTP_NOT_FOUND:
                        $message = 'Not found';

                        break;
                    case Response::HTTP_METHOD_NOT_ALLOWED:
                        $message = 'Method Not Allowed';

                        break;
                    case Response::HTTP_TOO_MANY_REQUESTS:
                        $exceptionCode = ErrorCodes::TOO_MANY_REQUESTS;

                        break;
                    default:
                }

                break;
        }

        if (!($e instanceof NotFoundHttpException || $e instanceof MethodNotAllowedHttpException)) {
            TraceLog::error(
                'ExceptionHandler',
                [
                    'url' => $request->fullUrl(),
                    'message' => $message,
                    'code' => $exceptionCode,
                    'request' => (array)$request->getContent(),
                    'exception' => (string)$e,
                ],
            );
        }
        $data = ['trace_id' => TraceLog::getTraceId(), 'code' => $exceptionCode, 'message' => $message,];
        if (config('app.debug')) {
            $data['trace'] = $e->getTrace();
        }

        return response()->json($data, $statusCode);
    }


    protected function getStatusCode(Throwable $e): int
    {
        return $e instanceof HttpExceptionInterface ?
            $e->getStatusCode() : Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
