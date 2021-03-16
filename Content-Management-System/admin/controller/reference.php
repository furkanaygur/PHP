<?php

if (permission('reference', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('reference')
    ->select('count(reference_ID) as total')
    ->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('reference')
    ->select('reference.*, GROUP_CONCAT(reference_categories.category_name SEPARATOR \', \') as category_name')
    ->join('reference_categories', 'FIND_IN_SET(reference_categories.category_ID, reference.reference_categories)')
    ->orderby('reference_ID', 'DESC')
    ->groupby('reference_ID')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('reference');
