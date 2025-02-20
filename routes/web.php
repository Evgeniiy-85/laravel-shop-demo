<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::group( ['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('admin.orders');

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/add', [App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.categories.add');
        Route::post('/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
        Route::get('/add', [App\Http\Controllers\Admin\ProductsController::class, 'add'])->name('admin.products.add');
        Route::post('/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('admin.products.create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->name('admin.products.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
    });

    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
});


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

