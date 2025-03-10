<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;
    public object $settings;

    public function __construct() {
        $this->settings = Setting::firstOrNew()->settings;

        \View::share([
            'settings' => $this->settings,
        ]);
    }
}
