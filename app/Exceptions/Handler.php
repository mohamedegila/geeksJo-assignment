<?php

namespace App\Exceptions;

use App\Http\Traits\CustomResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Exceptions\UnauthorizedException;

use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



use Throwable;

class Handler extends ExceptionHandler
{
    use CustomResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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


    public function render($request, Throwable $exception)
    {

        if ($exception
        instanceof
        \Illuminate\Database\Eloquent\ModelNotFoundException || $exception instanceof NotFoundHttpException)
            return $this->error('Not Found', 404);

        if ($exception instanceof UnauthorizedException)
            return $this->error('You do not have the required authorization', [],403);

        if ($exception instanceof AuthorizationException)
            return $this->error($exception->getMessage(),403);

        return parent::render($request, $exception);
    }
}
