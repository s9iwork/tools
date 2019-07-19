<?php

namespace App\Ddg\Providers;

use Illuminate\Support\ServiceProvider;

use App\Ddg\Services\DataGenerateServiceInterface;
use App\Ddg\Services\DataGenerateService;
use App\Ddg\Repositories\DataGenerateRepositoryInterface;
use App\Ddg\Repositories\DataGenerateRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
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
