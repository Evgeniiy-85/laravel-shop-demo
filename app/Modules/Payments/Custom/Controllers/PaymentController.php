<?php

namespace App\Modules\Payments\Custom\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Modules\Payments\Custom\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {

    public function pay($order_id, Request $request) {
        $this->validate($request, [
            'organization' => 'required|string',
            'inn' => 'required|string',
            'bik' => 'required|string',
            'billing_number' => 'required|string',
            'address' => 'required|string',
        ]);

        $order = Order::where('order_status', Order::STATUS_NO_PAID)
            ->where('order_id', $order_id)
            ->first();

        if (!$order) {
            abort(404);
        }

        $order->order_params = json_encode([
            'pay_info' => [
                'organization' => $request->input('organization'),
                'inn' => $request->input('inn'),
                'bik' => $request->input('bik'),
                'billing_number' => $request->input('billing_number'),
                'address' => $request->input('address'),
            ]
        ]);

        $payment = Payment::where(['pay_name' => 'custom'])->first();
        $order->payment_id = $payment->id;
        $order->save();
        return redirect()->route('payments.custom.success');
    }

    public function success() {
        return view('Custom.Views.payment.success');
    }
}
