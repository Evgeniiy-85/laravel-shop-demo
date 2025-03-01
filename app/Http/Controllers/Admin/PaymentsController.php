<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;

class PaymentsController extends AdminController {

    public function index() {
        $payments = Payment::all();

        return view('admin.settings.payments.index', [
            'payments' => $payments,
        ]);
    }
}
