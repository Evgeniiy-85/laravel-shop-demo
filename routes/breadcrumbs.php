<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Главная панель', route('admin'));
});
Breadcrumbs::for('admin.orders', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Заказы', route('admin.orders'));
});
Breadcrumbs::for('admin.orders.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.orders');
    $trail->push('Редактировать заказ');
});

/* Категории*/
Breadcrumbs::for('admin.categories', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Категории', route('admin.categories'));
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
    $trail->push('Продукты', route('admin.products'));
});
Breadcrumbs::for('admin.products.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push('Добавить продукт', route('admin.products.add'));
});
Breadcrumbs::for('admin.products.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push('Редактировать продукт');
});
Breadcrumbs::for('admin.products.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products');
    $trail->push('Настройки');
});

/* Пользователи*/
Breadcrumbs::for('admin.users', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Пользователи', route('admin.users'));
});
Breadcrumbs::for('admin.users.add', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Добавить пользователя', route('admin.users.add'));
});
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users');
    $trail->push('Редактировать пользователя');
});


/*FrontEnd*/
Breadcrumbs::for('catalog', function (BreadcrumbTrail $trail) {
    $trail->push('Каталог', route('catalog'));
});
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog');

    $data = [];
    while($category->cat_parent) {
        $parent = \App\Models\Category::find($category->cat_parent);
        array_unshift($data, [
            'title' => $category->cat_title,
            'url' => "/catalog/{$parent->cat_alias}/{$category->cat_alias}"
        ]);

        $category = $parent;
    }
    array_unshift($data, ['title' => $category->cat_title, 'url' => "/catalog/{$category->cat_alias}"]);

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
    $trail->push($product->prod_title);
});
Breadcrumbs::for('favorites', function (BreadcrumbTrail $trail) {
    $trail->parent('catalog');
    $trail->push('Избранное');
});
