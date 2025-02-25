<?php

namespace App\Modules\Payments\Custom\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;

class AdminController extends Controller {

    public function actionIndex() {
        $payment = Payment::where(['pay_name' => 'custom'])->first();
        if (!$payment) {
            return view('admin.errors.404');
        }

        return view('Custom.Views.admin.edit');
    }
}
