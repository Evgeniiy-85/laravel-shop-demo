<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;

class SettingsController extends AdminController {

    public function index() {
        return view('admin/index');
    }
}
