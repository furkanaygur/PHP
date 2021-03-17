<?php

$categories = $db->from('reference_categories')->orderby('category_order', 'ASC')->all();

if (route(1)) {
    $currentCategory = null;
    foreach ($categories as $category) {
        if ($category['category_url'] == route(1)) {
            $currentCategory = $category;
        }
    }
    if (!$currentCategory) {
        header('Location:' . siteURL('reference/'));
        exit;
    }

    require controller('_reference-category');
} else {

    $meta = [
        'title' => 'Reference | Furkan Aygur',
    ];
    $query = $db->from('reference')
        ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \', \') as category_name')
        ->join('reference_categories', 'FIND_IN_SET(reference_categories.category_ID, reference.reference_categories)')
        ->orderby('reference_ID', 'DESC')
        ->groupby('reference_ID')
        ->all();

    require view('reference');
}
