<?php

if (permission('contact', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('contact')
    ->select('count(contact_ID) as total')
    ->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('contact')
    ->join('users', '%s.user_ID = %s.contact_read_user', 'left')
    ->orderby('contact_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('contact');
