<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Order;

class PaymentsController extends Controller {

    public function index() {
        $payments = Payment::all();

        return view('admin.settings.payments.index', [
            'payments' => $payments,
        ]);
    }
}
