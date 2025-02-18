<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class SettingsController extends Controller {

    public function index() {

        return view('admin/index', []);
    }
}
