<?php

namespace App\Exceptions;


use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
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

        $this->renderable(function (\Exception $exception) {
           if($this->isHttpException($exception)) {
                if ($exception->getStatusCode() == 404) {
                    $prefix = request()->url();
                    $admin = \Illuminate\Support\Str::contains($prefix, 'dashboard/');
                    if($admin) {
                        return response()->view('dashboard.errors.' . '404', [], 404);
                    } else {
                        return response()->view('front.errors.' . '404', [], 404);
                    }
                }
            }
            return parent::render($request, $exception);
        });
        $this->reportable(function (\Exception $e) {
        });


    }
}
