<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order\Order;
use App\Models\Order\OrderItems;
use App\Models\Payment;

class OrdersController extends Controller {

    public function pay($order_id) {
        $order = Order::where('order_status', OrderStatus::STATUS_NO_PAID)
            ->where('order_id', $order_id)
            ->first();
        $order_items = OrderItems::where(['order_id' => $order_id])->get();

        if (!$order || !$order_items) {
            abort(404);
        }

        $payments = Payment::where('pay_status', 1)->get();

        return view('order.pay', [
            'order' => $order,
            'order_items' => $order_items,
            'payments' => $payments,
        ]);
    }


}
