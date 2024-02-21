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
        return Setting::firstOrCreate(['key' => $key], ['value' => $value]);
    }

}
