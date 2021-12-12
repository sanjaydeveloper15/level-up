<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof \Illuminate\Auth\AuthenticationException ){
            return jsonResponse(2,'Token authentication failed');
        }
        if($exception instanceof MethodNotAllowedHttpException) {
            return jsonResponse(2,$exception->getMessage());
        }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){
            return jsonResponse(2,'Url Not Found',$exception->getMessage());   
        }
        if ($exception instanceof Symfony\Component\Routing\Exception\RouteNotFoundException) {
            return redirect('/');
        }
        return parent::render($request, $exception);
    }
}
