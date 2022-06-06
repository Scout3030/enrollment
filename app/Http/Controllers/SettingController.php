<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        if ($request->hasFile('logo')) {
            $file = uploadFile('logo', 'settings');
            $request->merge(['logo' => 'storage/settings/'.$file]);
        }

        if ($request->hasFile('image')) {
            $file = uploadFile('image', 'settings');
            $request->merge(['image' => 'storage/settings/'.$file]);
        }

        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }
        return back()->with('status', __('Settings has been saved successfully'));
    }
}