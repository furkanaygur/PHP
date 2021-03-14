<?php

if (permission('tags', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('tags')
    ->select('count(tag_ID) as total')
    ->total();
$pageLimit = 5;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('tags')
    ->select('tags.*, COUNT(post_tag_ID) as total')
    ->join('post_tags', '%s.tag_ID = %s.tag_ID', 'left')
    ->groupby('tags.tag_ID')
    ->orderby('tag_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('tags');
