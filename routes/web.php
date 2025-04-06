<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*AdminPanel*/

Route::group( ['namespace' => 'Admin', 'prefix' => '/admin', 'middleware' => 'admin'], function() {
    Auth::routes([ 'register' => false, 'reset' => false, 'verify' => false]);

    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/404', [App\Http\Controllers\Admin\AdminController::class, 'error404'])->name('admin.errors.404');
    Route::group(['prefix' => '/orders'], function () {
        Route::get('/', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('admin.orders');
        Route::get('/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'edit'])->name('admin.orders.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'update'])->name('admin.orders.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'delete'])->name('admin.orders.delete');
    });

    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/add', [App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.categories.add');
        Route::post('/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
        Route::get('/add', [App\Http\Controllers\Admin\ProductsController::class, 'add'])->name('admin.products.add');
        Route::post('/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('admin.products.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->name('admin.products.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');

        Route::group(['prefix' => '/settings'], function () {
            Route::get('/', [App\Http\Controllers\Admin\ProductsSettingsController::class, 'index'])->name('admin.products.settings');
            Route::post('/update', [App\Http\Controllers\Admin\ProductsSettingsController::class, 'update'])->name('admin.products.settings.update');
        });
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users');
        Route::get('/add', [App\Http\Controllers\Admin\UsersController::class, 'add'])->name('admin.users.add');
        Route::post('/store', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete'])->name('admin.users.delete');
        Route::get('/auth/{id}', [App\Http\Controllers\Admin\UsersController::class, 'auth'])->name('admin.users.auth');
    });

    Route::group(['prefix' => '/settings'], function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
        Route::post('/update', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');
        Route::get('/payments', [App\Http\Controllers\Admin\PaymentsController::class, 'index'])->name('admin.settings.payments');
        Route::get('/extensions', [App\Http\Controllers\Admin\ExtensionsController::class, 'index'])->name('admin.settings.extensions');
        Route::get('/extensions/{ext_name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'edit'])->name('admin.settings.extensions.edit');
        Route::post('/extensions/{ext_name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'update'])->name('admin.settings.extensions.update');
    });

    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
});

Route::get('/admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'auth'])->name('admin.auth');

/*FrontEnd*/
Route::group( ['namespace' => 'User'], function() {
    Auth::routes([ 'register' => false, 'reset' => false, 'verify' => false]);

    Route::get('/', [App\Http\Controllers\CatalogController::class, 'index'])->name('home');

    Route::group(['prefix' => '/catalog'], function () {
        Route::get('/', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
        Route::get('/{alias}', [App\Http\Controllers\CatalogController::class, 'category'])->name('catalog.category');
        Route::get('/{alias}/{subcategory_alias}', [App\Http\Controllers\CatalogController::class, 'category'])->name('categories.subcategory');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
        Route::get('/{alias}', [App\Http\Controllers\ProductsController::class, 'product'])->name('products.product');

        Route::group( ['prefix' => '/{alias}/reviews', 'middleware' => 'auth'], function() {
            Route::get('/add', [App\Http\Controllers\ProductsReviewsController::class, 'add'])->name('products.reviews.add');
            Route::post('/add', [App\Http\Controllers\ProductsReviewsController::class, 'store'])->name('products.reviews.store');
        });
    });

    Route::get('/search', [App\Http\Controllers\ProductsController::class, 'search'])->name('search');
    Route::get('/favorites', [App\Http\Controllers\ProductsController::class, 'favorites'])->name('favorites');

    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout', [\App\Http\Controllers\CartController::class, 'addOrder'])->name('cart.add_order');
    Route::get('/pay/{order_date}', [\App\Http\Controllers\OrdersController::class, 'pay'])->name('order.pay');

    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'auth'])->name('auth');

$modules = config('modules.modules');
$path = config('modules.path');
$base_namespace = config('modules.base_namespace');

foreach ($modules as $module => $submodules) {
    if (!$submodules) {
        $route_path = base_path("$path/$module/Routes/web.php");
        $route_api_path = base_path("$path/$module/Routes/api.php");
        Route::middleware('web')->group($route_path);
        if (file_exists($route_api_path)) {
            Route::middleware('api')->prefix('api')->group($route_api_path);
        }

    } else {
        foreach ($submodules as $key => $submodule) {
            $route_path = base_path("$path/$module/$submodule/Routes/web.php");
            $route_api_path = base_path("$path/$module/$submodule/Routes/api.php");
            Route::middleware('web')->group($route_path);
            if (file_exists($route_api_path)) {
                Route::middleware('api')->prefix('api')->group($route_api_path);
            }
        }
    }
}
