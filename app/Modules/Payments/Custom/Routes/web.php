<?php
use Illuminate\Support\Facades\Route;

Route::post('/payments/custom/pay/{order_id}', [\App\Modules\Payments\Custom\Controllers\PaymentController::class, 'pay'])->name('payments.custom.pay');
Route::get('/payments/custom/success', [\App\Modules\Payments\Custom\Controllers\PaymentController::class, 'success'])->name('payments.custom.success');

Route::get('admin/settings/payments/custom', [\App\Modules\Payments\Custom\Controllers\AdminController::class, 'edit'])->name('admin.settings.payments.custom');
Route::post('admin/settings/payments/custom/update', [\App\Modules\Payments\Custom\Controllers\AdminController::class, 'update'])->name('admin.settings.payments.custom.update');
