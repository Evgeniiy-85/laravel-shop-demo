<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;

class CartController extends Controller {

    public function index() {
        $cart = new Cart();
        $cart->loadCart();

        return view('cart.index', [
            'cart' => $cart,
        ]);
    }

    public function checkout() {
        $cart = new Cart();
        $cart->loadCart();
        $order = new Order();

        return view('cart.checkout', [
            'cart' => $cart,
            'order' => $order,
        ]);
    }
}
