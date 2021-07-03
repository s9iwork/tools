<?php

declare(strict_types=1);

namespace App\Ams\Providers;

use App\Ams\Services\AmsService;
use App\Ams\Services\IAmsService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            IAmsService::class,
            AmsService::class
        );
    }
}
