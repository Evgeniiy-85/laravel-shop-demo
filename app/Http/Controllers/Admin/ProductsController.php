<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ProductsController extends Controller {

    public function index() {

        return view('admin.products.index', []);
    }

    public function add() {

        return view('admin.products.add', []);
    }
}
