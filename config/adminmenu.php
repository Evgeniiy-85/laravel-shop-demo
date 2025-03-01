<?php

return [
    [
        'text' => 'Заказы',
        'url' => 'admin.orders',
        'icon' => 'bi bi-cash-coin',
        'active' => ['admin.orders', 'admin.orders.*'],
    ],
    [
        'text' => 'Категории',
        'icon' => 'bi bi-table',
        'active' => ['admin.categories', 'admin.categories.*'],
        'submenu' => [
            [
                'text' => 'Список категорий',
                'icon' => 'bi bi-list',
                'url' => 'admin.categories',
                'active' => ['admin.categories', 'admin.categories.*'],
            ],
        ],
    ],
    [
        'text' => 'Продукты',
        'icon' => 'bi bi-briefcase',
        'label_color' => 'success',
        'active' => ['admin.products', 'admin.products.*'],
        'submenu' => [
            [
                'text' => 'Список продуктов',
                'icon' => 'bi bi-list',
                'url' => 'admin.products',
                'active' => ['admin.products', 'admin.products.*'],
            ],
        ],
    ],
    [
        'text' => 'Пользователи',
        'icon' => 'bi bi-people-fill',
        'label_color' => 'success',
        'active' => ['admin.users', 'admin.users.*'],
        'submenu' => [
            [
                'text' => 'Список пользователей',
                'icon' => 'bi bi-list',
                'url' => 'admin.users',
                'active' => ['admin.users', 'admin.users.*'],
            ],
        ],
    ],
    [
        'text' => 'Настройки',
        'icon' => 'bi bi-wrench-adjustable',
        'active' => ['admin.settings', 'admin.settings.*'],
        'submenu' => [
            [
                'text' => 'Основные настройки',
                'icon' => 'bi bi-wrench-adjustable',
                'url' => 'admin.settings',
                'active' => ['admin.settings'],
            ],
            [
                'text' => 'Платежные модули',
                'url' => 'admin.settings.payments',
                'icon' => 'bi bi-credit-card',
                'active' => ['admin.settings.payments', 'admin.settings.payments.*'],
            ],
        ],
    ],
];
