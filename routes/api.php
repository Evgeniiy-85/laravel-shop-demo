<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( ['namespace' => 'Admin', 'prefix' => '/admin', 'middleware' => 'admin'], function() {
    Route::post('/attachments/add', [\App\Http\Controllers\Admin\API\AttachmentsController::class, 'add'])->name('api.admin.attachments.add');
});

Route::group(['prefix' => '/cart'], function () {
    Route::post('/actions', [\App\Http\Controllers\API\CartController::class, 'actions'])->name('api.cart.actions');
});

Route::group(['prefix' => '/favorites'], function () {
    Route::post('/actions', [\App\Http\Controllers\API\FavoritesController::class, 'actions'])->name('api.favorites.actions');
});