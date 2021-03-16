<?php

if (permission('reference-categories', 'add')) {
    permissionPage();
}

if (post('submit')) {
    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));
    if (!post('category_url')) {
        $category_url = permalink($category_name);
    }
    $category_seo = json_encode(post('category_seo'));
    if (!$category_name) {
        $error = 'Please enter a category name';
    } else {
        $query = $db->from('reference_categories')->where('category_url', $category_url)
            ->first();

        if ($query) {
            $error = 'This category exist already';
        } else {
            $query = $db->insert('reference_categories')->set([
                'category_name' => $category_name,
                'category_url' => $category_url,
                'category_seo' => $category_seo
            ]);

            if ($query) {
                header('Location:' . adminURL('reference-categories'));
            } else {
                $error = 'Error';
            }
        }
    }
}

require adminView('add-reference-category');
