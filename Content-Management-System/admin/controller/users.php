<?php

if (permission('users', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('users')
    ->select('count(user_ID) as total')
    ->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('users')
    ->orderby('user_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('users');
