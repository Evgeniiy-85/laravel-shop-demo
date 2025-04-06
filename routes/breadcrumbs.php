<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push(__('Главная панель'), route('admin'));
});
Breadcrumbs::for('admin.orders', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push(__('Заказы'), route('admin.orders'));
});
Breadcrumbs::for('admin.orders.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.orders');
    $trail->push(__('Редактировать заказ'));
});

/* Категории*/
Breadcrumbs::for('admin.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push(__('Категории'), route('admin.categories'));
});
Breadcrumbs::for('admin.categories.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories');
    $trail->push(__('Добавить категорию'), route('admin.categories.add'));
});
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories');
    $trail->push(__('Редактировать категорию'));
});

Breadcrumbs::for('admin.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push(__('Настройки'), route('admin.settings'));
});

Breadcrumbs::for('admin.settings.extensions', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings');
    $trail->push(__('Расширения'), route('admin.settings.extensions'));
});
Breadcrumbs::for('admin.settings.extensions.edit', function (BreadcrumbTrail $trail, $ext_title) {
    $trail->parent('admin.settings.extensions');
    $trail->push($ext_title);
});


Breadcrumbs::for('admin.settings.payments', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings');
    $trail->push(__('Платежные модули'), route('admin.settings.payments'));
});

Breadcrumbs::for('admin.settings.payments.custom', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.settings.payments');
    $trail->push(__('Ручной способ'), route('admin.settings.payments.custom'));
});


/* Продукты*/
Breadcrumbs::for('admin.products', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push(__('Продукты'), route('admin.products'));
});
Breadcrumbs::for('admin.products.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push(__('Добавить продукт'), route('admin.products.add'));
});
Breadcrumbs::for('admin.products.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push(__('Редактировать продукт'));
});
Breadcrumbs::for('admin.products.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push(__('Настройки'));
});

/* Пользователи*/
Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push(__('Пользователи'), route('admin.users'));
});
Breadcrumbs::for('admin.users.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push(__('Добавить пользователя'), route('admin.users.add'));
});
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push(__('Редактировать пользователя'));
});


/*FrontEnd*/
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->push(__('Каталог'), route('catalog'));
});
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog');

    $data = [];
    while($category->parent) {
        $parent = \App\Models\Category::find($category->parent);
        array_unshift($data, [
            'title' => $category->title,
            'url' => "/catalog/{$parent->alias}/{$category->alias}"
        ]);

        $category = $parent;
    }
    array_unshift($data, ['title' => $category->title, 'url' => "/catalog/{$category->alias}"]);

    if ($data) {
        foreach ($data as $item) {
            $trail->push($item['title'], $item['url']);
        }
    }
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product, $category) {
    if ($category) {
        $trail->parent('category', $category);
    }
    $trail->push($product->title);
});
Breadcrumbs::for('favorites', function (BreadcrumbTrail $trail) {
    $trail->parent('catalog');
    $trail->push(__('Избранное'));
});

$modules = config('modules.modules');
