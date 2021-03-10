<?php

if (permission('pages', 'add')) {
    permissionPage();
}

if (post('submit')) {
    $page_title = post('page_title');
    $page_url = permalink(post('page_url'));
    if (!post('page_url')) {
        $page_url = permalink($page_title);
    }
    $page_content = post('page_content');
    $page_seo = json_encode(post('page_seo'));
    if (!$page_title ||  !$page_content) {
        $error = 'Please enter a page name and content';
    } else {
        $query = $db->from('pages')->where('page_url', $page_url)
            ->first();

        if ($query) {
            $error = 'This page exist already';
        } else {
            $query = $db->insert('pages')->set([
                'page_title' => $page_title,
                'page_url' => $page_url,
                'page_content' => $page_content,
                'page_seo' => $page_seo
            ]);

            if ($query) {
                header('Location:' . adminURL('pages'));
            } else {
                $error = 'Error';
            }
        }
    }
}

require adminView('add-page');
