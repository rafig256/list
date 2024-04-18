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
        //set dynamic timezone
        $timeZone = Setting::query()->where('key','site_timezone')->first();
        config()->set('app.timezone', $timeZone->value);

        //set default pagination design
        Paginator::useBootstrap();

        //set pusher config
        $key = ['pusher_app_id','pusher_key','pusher_secret','pusher_cluster'];
        $pusherConfig = Setting::query()->whereIn('key',$key)->pluck('value','key')->toArray();


//        config()->set('broadcasting.connections.pusher', [
//            'app_id' => $pusherConfig['pusher_app_id'],
//            'key' => $pusherConfig['pusher_key'],
//            'secret' => $pusherConfig['pusher_secret'],
//        ]);
        config(['broadcasting.connections.pusher.app_id' => $pusherConfig['pusher_app_id']]);
        config(['broadcasting.connections.pusher.key' => $pusherConfig['pusher_key']]);
        config(['broadcasting.connections.pusher.secret' => $pusherConfig['pusher_secret']]);
        config(['broadcasting.connections.pusher.options.cluster' => $pusherConfig['pusher_cluster']]);


    }

}
