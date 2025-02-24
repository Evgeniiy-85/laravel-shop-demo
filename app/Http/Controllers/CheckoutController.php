<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CheckoutController extends Controller {

    public function index() {
        $cart = new Cart();
        $cart->loadCart();
        $order = new Order();

        return view('checkout.index', [
            'cart' => $cart,
            'order' => $order,
        ]);
    }

    public function checkout() {
        $cart = new Cart();
        $cart->loadCart();
        $order = new Order();

        return view('checkout.index', [
            'cart' => $cart,
            'order' => $order,
        ]);
    }

    public function confirm() {

    }

}
