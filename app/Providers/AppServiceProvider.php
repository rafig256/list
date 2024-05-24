<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('settings')) {
            // Set dynamic timezone
            $timeZone = Setting::query()->where('key', 'site_timezone')->first();
            if ($timeZone) {
                config()->set('app.timezone', $timeZone->value);
            }

            // Set default pagination design
            Paginator::useBootstrap();

            // Set pusher config
            $key = ['pusher_app_id', 'pusher_key', 'pusher_secret', 'pusher_cluster'];
            $pusherConfig = Setting::query()->whereIn('key', $key)->pluck('value', 'key')->toArray();

            if (!empty($pusherConfig)) {
                config(['broadcasting.connections.pusher.app_id' => $pusherConfig['pusher_app_id']]);
                config(['broadcasting.connections.pusher.key' => $pusherConfig['pusher_key']]);
                config(['broadcasting.connections.pusher.secret' => $pusherConfig['pusher_secret']]);
                config(['broadcasting.connections.pusher.options.cluster' => $pusherConfig['pusher_cluster']]);
            }
        }

        // Set default pagination design
        Paginator::useBootstrap();
    }
}
