<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class AdminController extends Controller {

    public function index() {

        return view('admin.index', []);
    }

    public function error404() {

        return view('admin.errors.404', []);
    }


    public function login() {


    }

}
