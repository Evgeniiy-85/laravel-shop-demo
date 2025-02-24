<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;

class OrderController extends Controller {

    public function pay($order_id) {
        $order = Order::where('order_status', Order::STATUS_NO_PAID)
            ->where('order_id', $order_id)
            ->first();
        $order_items = OrderItems::where(['order_id' => $order_id])->get();

        if (!$order || !$order_items) {
            exit;
        }

        return view('order.pay', [
            'order' => $order,
            'order_items' => $order_items,
        ]);
    }


}
