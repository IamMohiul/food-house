<?php

namespace app\Services;

use App\Models\Setting;
use Cache;

class SettingsService
{

    function getSetting()
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings(): void
    {
        $settings = $this->getSetting();
        config()->set('settings', $settings);
    }

    function clearCachedSettings(): void
    {
        Cache::forget('settings');
    }
}
