<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Requests\Admin\SettingsRequest;

class SettingsController extends AdminController {

    public function index() {
        $settings = Setting::find(1);
        //$settings2 =  $settings ? json_decode($settings->params, 1) : null;


        return view('admin.settings.index', [
            'settings' => $settings ? json_decode($settings->params) : null,
        ]);
    }

    public function update(SettingsRequest $request) {
        $setting = Setting::find(1) ?: new Setting();
//        print_r($request->input('settings')['site_name'] === null);exit;

        $params = collect($request->input('settings'))->toJson();
        $setting->fill(['params' => $params, 'id' => 1]);
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Успешно');
    }
}
