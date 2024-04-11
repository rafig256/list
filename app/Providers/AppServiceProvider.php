<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
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
        $timeZone = Setting::query()->where('key','site_timezone')->first();
        config()->set('app.timezone', $timeZone->value);

        Paginator::useBootstrap();
    }

}
