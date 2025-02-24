<?php
use Illuminate\Support\Facades\Route;

Route::get('/payments/custom', [\App\Modules\Payments\Custom\Controllers\PaymentController::class, 'pay'])->name('pay.custom');
