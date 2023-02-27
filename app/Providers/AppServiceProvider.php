<?php

namespace App\Providers;

use App\Contracts\WeatherRepositoryContract;
use App\Contracts\WeatherServiceContract;
use App\Repositories\WeatherRepository;
use App\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WeatherRepositoryContract::class, WeatherRepository::class);
        $this->app->bind(WeatherServiceContract::class, WeatherService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
