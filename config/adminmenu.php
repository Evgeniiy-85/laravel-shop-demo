<?php

return [
    [
        'text' => 'Заказы',
        'url' => 'admin.orders',
        'icon' => 'bi-table',
        'active' => ['admin.orders', 'admin.orders.*'],
    ],
    [
        'text' => 'Категории',
        'icon' => 'bi-table',
        'active' => ['admin.categories', 'admin.categories.*'],
        'submenu' => [
            [
                'text' => 'Список категорий',
                'url' => 'admin.categories',
                'active' => ['admin.categories', 'admin.categories.*'],
            ],
        ],
    ],
    [
        'text' => 'Продукты',
        'icon' => 'bi-table',
        'label_color' => 'success',
        'active' => ['admin.products', 'admin.products.*'],
        'submenu' => [
            [
                'text' => 'Список продуктов',
                'url' => 'admin.products',
                'active' => ['admin.products', 'admin.products.*'],
            ],
        ],
    ],
    [
        'text' => 'Пользователи',
        'icon' => 'bi-table',
        'label_color' => 'success',
        'active' => ['admin.users', 'admin.users.*'],
        'submenu' => [
            [
                'text' => 'Список пользователей',
                'url' => 'admin.users',
                'active' => ['admin.users', 'admin.users.*'],
            ],
        ],
    ],
    [
        'text' => 'Настройки',
        'icon' => 'bi-table',
        'active' => ['admin.settings', 'admin.settings.*'],
        'submenu' => [
            [
                'text' => 'Основные настройки',
                'url' => 'admin.settings',
                'active' => ['admin.settings'],
            ],
            [
                'text' => 'Платежные модули',
                'url' => 'admin.settings.payments',
                'active' => ['admin.settings.payments', 'admin.settings.payments.*'],
            ],
        ],
    ],
];
