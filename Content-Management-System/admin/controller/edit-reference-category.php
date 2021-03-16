<?php

if (permission('reference-categories', 'edit')) {
    permissionPage();
}

$id = get('id');
if (!$id) {
    header('Location:' . adminURL('reference-catgories'));
    exit;
}

$row = $db->from('reference_categories')->where('category_ID', $id)->first();
if (!$row) {
    header('Location:' . adminURL('reference-catgories'));
    exit;
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
            ->where('category_ID', '!=')
            ->first();

        if ($query) {
            $error = 'This category exist already';
        } else {
            $query = $db->update('reference_categories')
                ->where('category_ID', $id)
                ->set([
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


$category_seo = json_decode($row['category_seo'], true);

require adminView('edit-reference-category');
