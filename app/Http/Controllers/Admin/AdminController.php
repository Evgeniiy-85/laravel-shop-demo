<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.index', []);
    }

    public function error404() {
        return view('admin.errors.404', []);
    }
}
