<?php
use Illuminate\Support\Facades\Route;

Route::post('/payments/custom/pay/{order_id}', [\App\Modules\Payments\Custom\Controllers\PaymentController::class, 'pay'])->name('payments.custom.pay');
