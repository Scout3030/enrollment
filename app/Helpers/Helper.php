<?php

namespace App\Helpers;

class Helper
{
    public static function uploadFile($key, $path)
    {
        request()->file($key)->store($path);
        return request()->file($key)->hashName();
    }

    public static function getB64Extension($base64_image, $full=null){  
        preg_match("/^data:image\/(.*);base64/i",$base64_image, $img_extension);   
        return ($full) ?  $img_extension[0] : $img_extension[1];  
    }

    public static function getB64Image($base64_image){  
        $image_service_str = substr($base64_image, strpos($base64_image, ",")+1);
        $image = base64_decode($image_service_str);   
        return $image; 
   }
}
