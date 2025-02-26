<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Order;

class OrdersController extends Controller {

    public function index() {
        $orders = Order::orderBy('order_id', 'desc')->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function edit($order_id) {
        $order = Order::where('order_id', $order_id)->first();
        if (!$order) {
            return view('admin.errors.404');
        }

        $payment = Payment::find($order->payment_id);
        $order->order_params = $order->order_params ? json_decode($order->order_params, 1) : null;

        return view('admin.orders.edit', [
            'order' => $order,
            'statuses' => Order::getStatuses(),
            'payment' => $payment->payment(),
        ]);
    }

    public function update($order_id, Request $request) {
        $order = Order::where('order_id', $order_id)->first();
        if (!$order) {
            return view('admin.errors.404');
        }

        $order->fill($request->all());
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Успешно');
    }
}
