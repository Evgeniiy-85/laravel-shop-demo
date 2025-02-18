<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
Route::get('/admin/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('admin.orders');
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
Route::get('/admin/products/add', [App\Http\Controllers\Admin\ProductsController::class, 'add'])->name('admin.products.add');
Route::get('/admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');


Route::get('/', function () {
    return view('home');
})->name('home');




Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::post('/contacts/submit', [ContactController::class, 'submit'])->name('contact-from');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts/messages', [ContactController::class, 'messages'])->name('messages');
Route::get('/contacts/messages/{id}', [ContactController::class, 'message'])->name('messages');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

