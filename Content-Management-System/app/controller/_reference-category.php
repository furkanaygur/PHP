<?php
$seo = json_encode($currentCategory['category_seo'], true);

$meta = [
    'title' => isset($seo['title']) ? $seo['title'] : $currentCategory['category_name'],
    'description' =>  isset($seo['description']) ? $seo['description'] : null
];

$query = $db->from('reference')
    ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \', \') as category_name')
    ->join('reference_categories', 'FIND_IN_SET(reference_categories.category_ID, reference.reference_categories)')
    ->findInSetReverse('reference_categories', $currentCategory['category_ID'])
    ->orderby('reference_ID', 'DESC')
    ->groupby('reference_ID')
    ->all();


require view('reference-category');
