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

if (! function_exists('getB64Extension')) {
    function getB64Extension($base64_image, $full = null)
    {
        preg_match("/^data:image\/(.*);base64/i", $base64_image, $img_extension);
        return ($full) ? $img_extension[0] : $img_extension[1];
    }
}

if (! function_exists('getB64Image')) {
    function getB64Image($base64_image)
    {
        $image_service_str = substr($base64_image, strpos($base64_image, ",") + 1);
        return base64_decode($image_service_str);
    }
}
