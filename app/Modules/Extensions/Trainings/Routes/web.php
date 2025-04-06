<?php

use Illuminate\Support\Facades\Route;

/*Backend*/

Route::group( ['namespace' => 'Admin', 'prefix' => '/admin', 'middleware' => 'admin'], function() {
    Route::group(['prefix' => '/trainings'], function () {
        Route::get('/settings', [\App\Modules\Extensions\Trainings\Controllers\Admin\SettingsController::class, 'edit'])->name('admin.trainings.settings.edit');
        Route::post('/settings/update', [\App\Modules\Extensions\Trainings\Controllers\Admin\SettingsController::class, 'update'])->name('admin.trainings.settings.update');

        Route::group(['prefix' => '/categories'], function () {
            Route::get('/', [\App\Modules\Extensions\Trainings\Controllers\Admin\CategoryController::class, 'index'])->name('admin.trainings.categories');
            Route::get('/add', [\App\Modules\Extensions\Trainings\Controllers\Admin\CategoryController::class, 'add'])->name('admin.trainings.categories.add');
            Route::get('/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.trainings.categories.edit');
            Route::post('/store', [\App\Modules\Extensions\Trainings\Controllers\Admin\CategoryController::class, 'store'])->name('admin.trainings.categories.store');
            Route::post('/update/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\CategoryController::class, 'update'])->name('admin.trainings.categories.update');
        });

        Route::group(['prefix' => '/{training_id}'], function () {
            Route::group(['prefix' => '/sections'], function () {
                Route::get('/', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'sections'])->name('admin.trainings.sections');
                Route::get('/add', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'add'])->name('admin.trainings.sections.add');
                Route::get('/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'edit'])->name('admin.trainings.sections.edit');
                Route::post('/store', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'store'])->name('admin.trainings.sections.store');
                Route::post('/update/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'update'])->name('admin.trainings.sections.update');
                Route::get('/delete/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\SectionController::class, 'delete'])->name('admin.trainings.sections.delete');
            });

            Route::group(['prefix' => '/lessons'], function () {
                Route::get('/add', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonController::class, 'add'])->name('admin.trainings.lessons.add');
                Route::post('/store', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonController::class, 'store'])->name('admin.trainings.lessons.store');
                Route::post('/update/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonController::class, 'update'])->name('admin.trainings.lessons.update');
                Route::get('/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonController::class, 'edit'])->name('admin.trainings.lessons.edit');
                Route::get('/delete/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonController::class, 'delete'])->name('admin.trainings.lessons.delete');
            });

            Route::get('/structure', [\App\Modules\Extensions\Trainings\Controllers\Admin\StructureController::class, 'structure'])->name('admin.trainings.structure');
        });

        Route::group(['prefix' => '/lesson-elements'], function () {
            Route::post('/store/{lesson_id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonElementController::class, 'store'])->name('admin.trainings.lesson.elements.store');
            Route::post('/update/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonElementController::class, 'update'])->name('admin.trainings.lesson.elements.update');
            Route::get('/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonElementController::class, 'edit'])->name('admin.trainings.lesson.elements.edit');
            Route::get('/delete/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\LessonElementController::class, 'delete'])->name('admin.trainings.lesson.elements.delete');
        });

        Route::get('/', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'index'])->name('admin.trainings');
        Route::get('/add', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'add'])->name('admin.trainings.add');
        Route::get('/edit/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'edit'])->name('admin.trainings.edit');
        Route::post('/store', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'store'])->name('admin.trainings.store');
        Route::post('/update/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'update'])->name('admin.trainings.update');
        Route::delete('/delete/{id}', [\App\Modules\Extensions\Trainings\Controllers\Admin\TrainingController::class, 'destroy'])->name('admin.trainings.delete');
    });
});

/*Frontend*/

Route::group(['prefix' => '/training'], function () {
    Route::get('/', [\App\Modules\Extensions\Trainings\Controllers\HomeController::class, 'index'])->name('trainings.home');
    Route::get('/view/{alias}', [\App\Modules\Extensions\Trainings\Controllers\TrainingController::class, 'training'])->name('trainings.training');
    Route::get('/category/{alias}', [\App\Modules\Extensions\Trainings\Controllers\CategoryController::class, 'category'])->name('trainings.category');
    Route::get('/section/{alias}', [\App\Modules\Extensions\Trainings\Controllers\SectionController::class, 'section'])->name('trainings.section');
    Route::get('/lesson/{alias}', [\App\Modules\Extensions\Trainings\Controllers\LessonController::class, 'lesson'])->name('trainings.lesson');
});

app('view')->addNamespace('trainings', __DIR__.'/../Views');

require_once __DIR__.'/breadcrumbs.php';
