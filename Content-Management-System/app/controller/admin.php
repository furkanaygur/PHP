<?php

if (!route(1)) {
    $route[1] = 'index';
}
if (!file_exists(adminController(route(1)))) {
    $route[1] = 'index';
}

$menus = [
    'index' => [
        'title' => 'Home',
        'icon' => 'tachometer'
    ],
    'users' => [
        'title' => 'Users',
        'icon' => 'user'
        // 'submenu' => [
        //     'add-user' => 'Add User',
        //     'list-users' => 'List Users'
        // ]
    ],
    'menu-settings' => [
        'title' => 'Menu Settings',
        'icon' => 'bars'
    ],
    'settings' => [
        'title' => 'Settings',
        'icon' => 'cog'
    ],


];

require adminController(route(1));
