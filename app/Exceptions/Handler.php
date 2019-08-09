<?php

namespace App\Exceptions;

use App\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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

        if ($exception instanceof QueryException) {
            $errorCode = $exception->errorInfo[1];
            if ($errorCode == 1062) {
                return response()->json(
                    [
                        'status' => Response::HTTP_CONFLICT,
                        'message' => trans('messages.custom.'.Response::HTTP_CONFLICT)
                    ],
                    Response::HTTP_CONFLICT
                );

            }
        } elseif ($exception instanceof ModelNotFoundException) {
            if ($exception->getModel() == User::class) {
                return response()->json(
                    [
                        'statue' => Response::HTTP_UNAUTHORIZED,
                        'message' => trans('messages.custom.'.Response::HTTP_UNAUTHORIZED)
                    ],
                    Response::HTTP_UNAUTHORIZED
                );
            }
        }


        return parent::render($request, $exception);
    }
}
