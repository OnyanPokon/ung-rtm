<?php

namespace App\Providers;

use App\Services\AmiService;
use App\Services\SurveiService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(AmiService::class, function ($app) {
            return new AmiService();
        });

        $this->app->singleton(SurveiService::class, function ($app) {
            return new SurveiService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
