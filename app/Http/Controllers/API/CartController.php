<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller {

    public function actions(Request $request) {
        $this->validate($request, [
            'action_type' => 'required',
            'prod_id' => 'nullable|integer'
        ]);

        $cart = new Cart();
        $prod_id = isset($request->prod_id) ? (int)$request->prod_id : null;

        switch($request->action_type) {
            case 'get':
                $cart->loadCart();
                break;
            case 'append':
                $cart->changeProduct($prod_id, 1);
                break;
            case 'reduce':
                $cart->changeProduct($prod_id, -1);
                break;
            case 'product_remove':
                $cart->changeProduct($prod_id, 0);
                break;
            case 'cart_remove':
                $cart->remove();
                break;
        }

        if ($cart->products) {
            return view('cart.products', [
                'cart' => $cart,
            ]);
        }
    }


}
