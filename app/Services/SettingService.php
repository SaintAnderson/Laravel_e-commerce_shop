<?php

namespace App\Services;

use App\Models\Setting;

class SettingService
{
    public function get($key, $defaultValue = null)
    {
        return Setting::where('key', $key)->value('value') ?? $defaultValue;
    }

    public function set($key, $value)
    {
        $setting = Setting::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->save();

        return $setting;
    }

}
