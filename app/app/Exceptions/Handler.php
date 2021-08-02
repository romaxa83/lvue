<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;

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

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
//        dd($exception->getMessage());

        // переопределяем сообщения об ошибках
        if ($request->ajax() || $request->wantsJson())
        {
            $message = $exception->getMessage();

            // переопределяем статус код для неавторизованого пользователя
            if($exception instanceof AuthenticationException){
                return response()->json([
                    'success' => false,
                    'data' => $exception->getMessage()
                ], 401);
            }

            // при ошибки валидации формируем массив ошибок
            if($exception instanceof  ValidationException){
                $message = [];
                foreach ($exception->errors() as $errors){
                    foreach($errors as $mes){
                        $message[] = $mes;
                    }
                }
            }

            return response()->json([
                'success' => false,
                'data' => $message
            ], 400);
        }

        return parent::render($request, $exception);
    }
}
