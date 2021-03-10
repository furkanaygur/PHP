<?php

if (permission('pages', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('pages')
    ->select('count(page_ID) as total')
    ->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('pages')
    ->orderby('page_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('pages');
