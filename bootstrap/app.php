<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'checkAdmin' => \App\Http\Middleware\AdminMiddleware::class,
            'checkStudent' => \App\Http\Middleware\StudentMiddleware::class,
            'checkProcess' => \App\Http\Middleware\ProcessMiddleware::class,
            'varifyStudent' => \App\Http\Middleware\VarifyMiddleware::class,
            'checkSuperAdmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
            'checkMessenger' => \App\Http\Middleware\AuthenticationMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
