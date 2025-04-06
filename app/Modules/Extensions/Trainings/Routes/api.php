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

Route::group(['prefix' => '/admin/trainings'], function () {
    Route::post('/sort/update', [\App\Modules\Extensions\Trainings\Controllers\Admin\API\SortController::class, 'update'])->name('api.admin.trainings.sort.update');
    Route::get('/lesson-elements/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\API\LessonElementController::class, 'edit'])->name('api.admin.trainings.lesson.elements.edit');
    Route::post('/lesson-elements/update-sort', [\App\Modules\Extensions\Trainings\Controllers\Admin\API\LessonElementController::class, 'updateSort'])->name('api.admin.trainings.lesson.elements.update-sort');

});
