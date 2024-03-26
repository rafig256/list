<?php

namespace App\Providers;

use App\Services\PaymentSettingsService;
use Illuminate\Support\ServiceProvider;

class PaymentSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentSettingsService::class, function (){

            return new PaymentSettingsService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $paymentSettings = $this->app->make(PaymentSettingsService::class);
        $paymentSettings->setGlobalSettings();
    }
}
