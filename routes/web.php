<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


/*AdminPanel*/

Route::group( ['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/404', [App\Http\Controllers\Admin\AdminController::class, 'error404'])->name('admin.errors.404');
    Route::get('/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('admin.orders');

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/add', [App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.categories.add');
        Route::post('/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
        Route::get('/add', [App\Http\Controllers\Admin\ProductsController::class, 'add'])->name('admin.products.add');
        Route::post('/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('admin.products.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->name('admin.products.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users');
        Route::get('/add', [App\Http\Controllers\Admin\UsersController::class, 'add'])->name('admin.users.add');
        Route::post('/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('admin.users.delete');
    });

    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
});


/*FrontEnd*/


Route::get('/', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');

Route::group(['prefix' => '/catalog'], function () {
    Route::get('/', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
    Route::get('/category', [App\Http\Controllers\Admin\CategoriesController::class, 'category'])->name('categories.category');
});
Route::group(['prefix' => '/catalog/{alias}'], function () {
    Route::get('/', [App\Http\Controllers\CatalogController::class, 'category'])->name('category');
    Route::get('/category', [App\Http\Controllers\Admin\CategoriesController::class, 'category'])->name('categories.category');
});

Route::group(['prefix' => '/categories'], function () {
    Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('categories');
    Route::get('/category', [App\Http\Controllers\Admin\CategoriesController::class, 'category'])->name('categories.category');
});

Route::group(['prefix' => '/products'], function () {
    Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('products');
    Route::get('/product', [App\Http\Controllers\Admin\ProductsController::class, 'category'])->name('products.product');
});

Route::group(['prefix' => '/cart'], function () {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
});

Route::group(['prefix' => '/api'], function () {
    Route::group(['prefix' => '/cart'], function () {
        Route::post('/actions', [\App\Http\Controllers\API\CartController::class, 'actions'])->name('cart.actions');
    });

    Route::group(['prefix' => '/favorites'], function () {
        Route::post('/', [\App\Http\Controllers\API\FavoritesController::class, 'index'])->name('favorites');
        Route::post('/actions', [\App\Http\Controllers\API\FavoritesController::class, 'actions'])->name('favorites.actions');
    });
});




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



