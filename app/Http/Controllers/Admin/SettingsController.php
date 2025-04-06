<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingsRequest;
use App\Models\Setting;

class SettingsController extends AdminController {

    public function index() {
        return view('admin.settings.index', [
            'settings' => $this->settings,
        ]);
    }

    public function update(SettingsRequest $request) {
        $setting = Setting::firstOrNew();
        $settings = $request->input('settings');

        if ($request->hasFile('files.logo')) {
            $image = $request->file('files.logo');
            $settings['logo'] = $image->storeAs('', "logo.{$image->extension()}", 'main');
        }

        if ($request->hasFile('files.favicon')) {
            $image = $request->file('files.favicon');
            $settings['favicon'] = $image->storeAs('', 'favicon.ico', 'main');
        }

        $setting->fill(['params' => $settings]);
        $setting->save();

        return redirect()->route('admin.settings')->with('success', 'Успешно');
    }
}
