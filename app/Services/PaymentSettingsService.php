<?php

namespace App\Services;

use App\Models\PaymentSetting;
use Cache;

class PaymentSettingsService {
    public function getSettings()
    {
        return Cache::rememberForever('payment', function () {
            return PaymentSetting::query()->pluck('value', 'key')->toArray();
        });
    }

    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('payment', $settings);
    }

    public function clearCachedSettings()
    {
        Cache::forget('payment');
    }
}


