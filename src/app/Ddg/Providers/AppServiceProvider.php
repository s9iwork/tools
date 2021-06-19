<?php

declare(strict_types=1);

namespace App\Ddg\Providers;
 
use App\Ddg\Repositories\DataGenerateRepository;
use App\Ddg\Repositories\DataGenerateRepositoryInterface;
use App\Ddg\Services\DataGenerateService;
use App\Ddg\Services\DataGenerateServiceInterface;
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
            DataGenerateServiceInterface::class,
            DataGenerateService::class
        );
        $this->app->bind(
            DataGenerateRepositoryInterface::class,
            DataGenerateRepository::class
        );
    }
}
