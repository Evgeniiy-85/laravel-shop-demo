<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Order;

class OrdersController extends Controller {

    public function index() {
        $orders = Order::all();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
}
