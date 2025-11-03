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
        if (config('app.force_https')) {
            URL::forceScheme('https');
        }

        if (app()->environment('production')) {
            URL::forceScheme('https'); // keep this for HTTPS

            // Auto-create storage symlink if it's missing
            $link   = public_path('storage');
            $target = storage_path('app/public');

            if (!is_link($link) && is_dir($target)) {
                try {
                    @symlink($target, $link);
                } catch (\Throwable $e) {
                    // ignore – app still runs
                }
            }
        }
    }
}
