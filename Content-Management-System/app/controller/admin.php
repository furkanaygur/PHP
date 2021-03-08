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
        'icon' => 'user',
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
    'contact' => [
        'title' => 'Contacts',
        'icon' => 'envelope',
        'permissions' => [
            'send' => 'Send',
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'menu-settings' => [
        'title' => 'Menu Settings',
        'icon' => 'bars',
        'permissions' => [
            'add' => 'Add',
            'view' => 'View',
            'edit' => 'Edit',
            'delete' => 'Delete'
        ]
    ],
    'settings' => [
        'title' => 'Settings',
        'icon' => 'cog',
        'permissions' => [
            'view' => 'View',
            'edit' => 'Edit'
        ]
    ],


];

require adminController(route(1));
