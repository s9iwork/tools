<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\DataGenerateService;
use App\Services\DataGenerateServiceImpl;
use App\Repositories\DataGenerateRepository;
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
			DataGenerateService::class,
			DataGenerateServiceImpl::class,
			DataGenerateRepository::class,
			DataGenerateRepositoryImpl::class
		);
    }
}
