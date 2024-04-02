<?php

namespace App\Providers;

use App\Services\Storage\StorageService;
use App\Services\Storage\SwitchManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StorageService::class, fn() => new StorageService(
            $this->app->make(SwitchManager::class),
            config('storage.type')
        ));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
