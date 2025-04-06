<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order\Order;

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
