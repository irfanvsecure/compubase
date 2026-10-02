<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        // Claude signs in through OAuth: the approval screen, and how long its access lasts.
        // Claude renews the short-lived access token with the refresh token on its own.
        Passport::authorizationView('mcp.authorize');
        Passport::tokensExpireIn(now()->addDays(7));
        Passport::refreshTokensExpireIn(now()->addDays(60));

        // Behind the host's proxy the request may look like http; OAuth addresses must be https.
        if (str_starts_with((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

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
