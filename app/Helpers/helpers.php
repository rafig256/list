<?php

if (! function_exists('setActive')) {
    /**
     * تشخیص کلاس active برای منوی فعلی
     *
     * @param array $routes آرایه‌ای از آدرس‌های روتی که می‌خواهید با آنها تطبیق دهید
     * @return string
     */
    function setActive(array $routes)
    {
        if (in_array(request()->route()->getName(),$routes)){
            return 'active';
        }else{
            return "";
        }
    }

    if (!function_exists('addCurrencyIcon')){
        function addCurrencyIcon(string $amount) : string
        {
            if (config('settings.site_currency_position') == 'left'){
                return config('settings.site_currency_icon').$amount;
            }else{
                return $amount.config('settings.site_currency_icon');
            }
        }
    }
}

