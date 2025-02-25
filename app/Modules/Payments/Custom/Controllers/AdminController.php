<?php

namespace App\Modules\Payments\Custom\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller {

    public function edit() {
        $payment = Payment::where(['pay_name' => 'custom'])->first();
        if (!$payment) {
            return view('admin.errors.404');
        }

        return view('Custom.Views.admin.edit', [
            'payment' => $payment
        ]);
    }


    public function update(Request $request) {
        $payment = Payment::where(['pay_name' => 'custom'])->first();
        if (!$payment) {
            abort(404);
        }

        $payment->fill($request->all());

        if ($request->hasFile('pay_image')) {
            if ($payment->pay_image) {
                Storage::disk('payments')->delete($payment->pay_image);
            }

            $image = $request->file('pay_image');
            $payment->pay_image = $image->store('', 'payments');
        }

        $payment->save();
        return redirect()->route('admin.settings.payments')->with('success', 'Успешно');
    }
}
