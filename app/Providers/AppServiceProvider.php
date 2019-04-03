<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\DataGenerateServiceInterface;
use App\Services\DataGenerateServiceImpl;
use App\Repositories\DataGenerateRepositoryInterface;
use App\Repositories\DataGenerateRepositoryImpl;


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
			DataGenerateServiceImpl::class
		);
		$this->app->bind(
			DataGenerateRepositoryInterface::class,
			DataGenerateRepositoryImpl::class
		);
    }
}
