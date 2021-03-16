<?php

if (permission('posts', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('posts')
    ->select('count(post_ID) as total')
    ->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->groupby('posts.post_ID')
    ->orderby('post_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require adminView('posts');
