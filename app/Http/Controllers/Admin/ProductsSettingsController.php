<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\ProductsSettingsRequest;
use App\Models\Product\ProductSetting;

class ProductsSettingsController extends AdminController {

    public function index() {
        $setting = ProductSetting::firstOrNew();
        $settings = $setting->settings ?? null;

        return view('admin.products.settings', [
            'product_settings' => $settings
        ]);
    }


    public function update(ProductsSettingsRequest $request) {
        $setting = ProductSetting::firstOrNew();
        $settings = $request->input('settings');

        $setting->fill(['params' => collect($settings)->toJson(), 'id' => 1]);
        $setting->save();

        return redirect()->route('admin.products.settings')->with('success', 'Успешно');
    }
}
