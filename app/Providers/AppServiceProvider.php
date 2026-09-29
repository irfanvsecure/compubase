<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            return;
        }

        $root = request()->root();
        $clean = preg_replace('#/public$#', '', $root);
        if (is_string($clean) && $clean !== $root) {
            URL::forceRootUrl($clean);
        }
    }
}
