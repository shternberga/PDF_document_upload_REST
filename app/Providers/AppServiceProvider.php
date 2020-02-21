<?php

namespace App\Providers;

use App\ThumbnailManager\ImagickThumbnailManager;
use App\ThumbnailManager\ThumbnailManagerInterface;
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
        $this->app->bind(ThumbnailManagerInterface::class, function ($app) {
            return new ImagickThumbnailManager();
        });
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
