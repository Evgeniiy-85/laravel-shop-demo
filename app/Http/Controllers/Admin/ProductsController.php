<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Product;

class ProductsController extends Controller {

    public function index() {

        return view('admin.products.index', []);
    }

    public function add() {
        $categories = [];
        return view('admin.products.add', [
            'categories' => $categories,
            'statuses' => Product::getStatuses(),
        ]);
    }
}
