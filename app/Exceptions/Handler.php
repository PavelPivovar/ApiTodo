<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {


            if ($exception instanceof NotFoundHttpException)
            {
                return response()->json([
                    'error' => 'Incorect route'
                ], Response::HTTP_NOT_FOUND);
            }

            elseif ($exception instanceof ModelNotFoundException)
            {
                return response()->json([
                    'error' => 'This  model not found'
                ], Response::HTTP_NOT_FOUND);
            }

            elseif ($exception instanceof TokenInvalidException)
            {
                return response()->json([
                    'eroor' => 'Token is Invalid'
                ], Response::HTTP_NOT_FOUND);
            }

            elseif ($exception instanceof TokenExpiredException)
            {
                return response()->json([
                    'eroor' => 'Token is Expired'
                ], Response::HTTP_NOT_FOUND);
            }

            elseif ($exception instanceof JWTException)
            {
                return response()->json([
                    'eroor' => 'Then is problem with your token'
                ], Response::HTTP_NOT_FOUND);
            }



        return parent::render($request, $exception);
        }

}
