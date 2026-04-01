<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckSchoolStatus;
use App\Http\Middleware\CheckStudentStatus;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check-login' =>CheckSchoolStatus::class,
        ]);
    })
     ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check-student-login' =>CheckStudentStatus::class,
        ]);
    })


    ->withMiddleware(function ($middleware) {
        $middleware->alias([
               'csrf' => ValidateCsrfToken::class,
        ]);
    })


    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
