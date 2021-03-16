<?php

if (!route(1)) {
    $route[1] = 'index';
}
if (!file_exists(adminController(route(1)))) {
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3) {
    $route[1] = 'login';
}
$menus = [
    [
        'url' => 'index',
        'title' => 'Home',
        'icon' => 'home',
        'permissions' => [
            'view' => 'View'
        ]
    ],
    [
        'url' => 'reference',
        'title' => 'References',
        'icon' => 'people-arrows',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'submenu' => [
            [
                'url' => 'reference-categories',
                'title' => 'Reference Categories',
                'permissions' => [
                    'view' => 'View',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ],
            ]
        ]

    ],
    [
        'url' => 'users',
        'title' => 'Users',
        'icon' => 'users-cog',
        'permissions' => [
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'pages',
        'title' => 'Pages',
        'icon' => 'file',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'posts',
        'title' => 'Blog',
        'icon' => 'rss',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
        'submenu' => [
            [
                'url' => 'posts',
                'title' => 'Posts',
            ],
            [
                'url' => 'tags',
                'title' => 'Tags',
                'permissions' => [
                    'view' => 'View',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ]
            ],
            [
                'url' => 'categories',
                'title' => 'Categories',
                'permissions' => [
                    'view' => 'View',
                    'add' => 'Add',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ]
            ],
            [
                'url' => 'comments',
                'title' => 'Comments',
                'icon' => 'comments',
                'permissions' => [
                    'view' => 'View',
                    'edit' => 'Edit',
                    'delete' => 'Delete'
                ]
            ],
        ]
    ],
    [
        'url' => 'contact',
        'title' => 'Contacts',
        'icon' => 'address-book',
        'permissions' => [
            'view' => 'View',
            'send' => 'Send',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ],
    ],
    [
        'url' => 'menu-settings',
        'title' => 'Menu Settings',
        'icon' => 'sliders-h',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    [
        'url' => 'settings',
        'title' => 'Settings',
        'icon' => 'cogs',
        'permissions' => [
            'view' => 'View',
            'edit' => 'Edit'
        ]
    ],


];

require adminController(route(1));
