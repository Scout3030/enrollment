<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting();
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (! function_exists('uploadFile')) {
    function uploadFile($key, $path)
    {
        request()->file($key)->store($path);
        return request()->file($key)->hashName();
    }
}
