<?php

if (post('submit')) {
    $menu = [];
    $menu_title = post('menu_title');
    if (!$menu_title) {
        $error = 'Please enter a menu title!';
    } elseif (count(array_filter(post('title'))) == 0) {
        $error = 'There must be at least 1';
    } else {
        $urls = post('url');
        foreach (post('title') as $key => $title) {
            $arr = [
                'title' => $title,
                'url' => $urls[$key]
            ];
            if (post('sub_title_' . $key)) {
                $submenu = [];
                $suburls = post('sub_url_' . $key);
                foreach (post('sub_title_' . $key) as $k => $subtitle) {
                    $submenu[] = [
                        'title' => $subtitle,
                        'url' => $suburls[$k]
                    ];
                }
                $arr['submenu'] = $submenu;
            }
            $menu[] = $arr;
        }

        // database
        $query = $db->prepare('INSERT INTO menu SET menu_title = :menutitle, menu_content = :menucontent');
        $result = $query->execute([
            'menutitle' => $menu_title,
            'menucontent' => json_encode($menu)
        ]);
        if ($result) {
            header('Location:' . adminURL('menu-settings'));
        } else {
            $error = 'Error';
        }
    }
}
require adminView('add-menu');
