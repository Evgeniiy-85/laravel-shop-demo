<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;

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

        return view('cart.checkout', [
            'cart' => $cart,
        ]);
    }

    public function addOrder(Request $request) {
        $this->validate($request, [
            'client_name'  => 'required',
            'client_surname'  => 'required',
            'client_email'  => 'required',
            'client_phone'  => 'required'
        ]);

        $cart = new Cart();
        $cart->loadCart();
        if (!$cart->products) {
            abort(404);
        }

        $order = new Order();
        $order->fill([
            'order_sum' => $cart->total,
            'client_name' => $request->input('client_name'),
            'client_surname' => $request->input('client_surname'),
            'client_patronymic' => $request->input('client_patronymic'),
            'client_email' => $request->input('client_email'),
            'client_phone' => $request->input('client_phone'),
            'order_date' => Carbon::now(),
        ]);

        if ($order->save()) {
            foreach ($cart->products as $prod_id => $product) {
                $order_items = new OrderItems();
                $order_items->fill([
                    'order_id' => $order->order_id,
                    'prod_id' => $product->prod_id,
                    'prod_price' => $product->prod_price,
                    'prod_title' => $product->prod_title,
                    'quantity' => $cart->quantity[$prod_id],
                ]);
                $order_items->save();
            }

            $cart->remove();
            return redirect()->route('order.pay', $order->order_id);
        }
    }

}
