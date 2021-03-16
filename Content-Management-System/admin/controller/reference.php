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
    ->orderby('reference_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('reference');
