<?php

use App\Models\Redirect;
use App\Support\Seo;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Before showing "not found", follow any redirect saved for the address.
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if (! $request->isMethod('GET')) {
                return null;
            }
            try {
                $redirect = Redirect::where('from_path', Seo::path($request->path()))->first();
            } catch (Throwable) {
                return null;
            }
            if ($redirect === null) {
                return null;
            }
            $redirect->increment('hits');

            return redirect()->away($redirect->target(), $redirect->status_code);
        });
    })->create();
