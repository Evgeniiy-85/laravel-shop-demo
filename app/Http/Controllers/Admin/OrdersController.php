<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OrdersRequest;
use App\Models\Order\Order;
use App\Models\Payment;

class OrdersController extends AdminController {

    public function index() {
        return view('admin.orders.index', [
            'orders' => Order::orderBy('order_date', 'desc')->paginate($this->settings->count_items),
        ]);
    }

    public function edit($order_id) {
        $order = Order::where('order_id', $order_id)->first();
        if (!$order) {
            return view('admin.errors.404');
        }

        $payment = $order->payment_id ? Payment::find($order->payment_id) : null;
        $order->order_params = $order->order_params ? json_decode($order->order_params, 1) : null;

        return view('admin.orders.edit', [
            'order' => $order,
            'payment' => $payment ? $payment->payment() : null,
        ]);
    }

    public function update($order_id, OrdersRequest $request) {
        $order = Order::where('order_id', $order_id)->first();
        if (!$order) {
            return view('admin.errors.404');
        }

        $order->fill($request->all());
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Успешно');
    }
}
