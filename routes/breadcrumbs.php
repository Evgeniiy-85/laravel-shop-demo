<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Главная панель', route('admin.index'));
});
Breadcrumbs::for('admin.orders', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Список заказов', route('admin.orders'));
});
Breadcrumbs::for('admin.orders.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.orders');
    $trail->push('Редактировать заказ');
});

/* Категории*/
Breadcrumbs::for('admin.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Список категорий', route('admin.categories'));
});
Breadcrumbs::for('admin.categories.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories');
    $trail->push('Добавить категорию', route('admin.categories.add'));
});
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories');
    $trail->push('Редактировать категорию');
});

Breadcrumbs::for('admin.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Настройки', route('admin.settings'));
});

Breadcrumbs::for('admin.settings.payments', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings');
    $trail->push('Платежные модули', route('admin.settings.payments'));
});

Breadcrumbs::for('admin.settings.payments.custom', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings.payments');
    $trail->push('Ручной способ', route('admin.settings.payments.custom'));
});


/* Продукты*/
Breadcrumbs::for('admin.products', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Список продуктов', route('admin.products'));
});
Breadcrumbs::for('admin.products.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push('Добавить продукт', route('admin.products.add'));
});
Breadcrumbs::for('admin.products.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push('Редактировать продукт');
});

/* Пользователи*/
Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Список пользователей', route('admin.users'));
});
Breadcrumbs::for('admin.users.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Добавить пользователя', route('admin.users.add'));
});
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Редактировать пользователя');
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
