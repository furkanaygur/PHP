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
    'index' => [
        'title' => 'Home',
        'icon' => 'home',
        'permissions' => [
            'view' => 'View'
        ]
    ],
    'users' => [
        'title' => 'Users',
        'icon' => 'users-cog',
        'permissions' => [
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
        // 'submenu' => [
        //     'add-user' => 'Add User',
        //     'list-users' => 'List Users'
        // ]
    ],
    'pages' => [
        'title' => 'Pages',
        'icon' => 'file',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'categories' => [
        'title' => 'Categories',
        'icon' => 'folder',
        'permissions' => [
            'view' => 'View',
            'add' => 'Add',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'contact' => [
        'title' => 'Contacts',
        'icon' => 'address-book',
        'permissions' => [
            'send' => 'Send',
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'menu-settings' => [
        'title' => 'Menu Settings',
        'icon' => 'sliders-h',
        'permissions' => [
            'add' => 'Add',
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'settings' => [
        'title' => 'Settings',
        'icon' => 'cogs',
        'permissions' => [
            'view' => 'View',
            'edit' => 'Edit'
        ]
    ],


];

require adminController(route(1));
