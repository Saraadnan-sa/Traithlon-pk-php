<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // Comment out the CSRF middleware


        $middleware->statefulApi();
        $middleware->validateCsrfTokens(
            // Specify the routes to exclude from CSRF protection
            except: ['stripe/*', 'login', 'register']
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
