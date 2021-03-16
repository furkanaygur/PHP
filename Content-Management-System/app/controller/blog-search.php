<?php

if (!get('q')) {
    header('Location:' . siteURL('blog'));
    exit;
}

$totalRecord = $db->from('posts')
    ->select('count(DISTINCT post_ID) as total')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->where('post_status', 2)
    ->group(function ($db) {
        $db->where('post_title', get('q'), 'LIKE')
            ->or_where('post_content', get('q'), 'LIKE')
            ->or_where('post_short_content', get('q'), 'LIKE');
    })
    ->total();

$pageLimit = 1;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$currentPageCount = !empty($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : 1;
$currentPageCount = is_array($currentPageCount) ? ($currentPageCount[1] ? $currentPageCount[1] : $currentPageCount[2]) : $currentPageCount;

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->where('post_status', 2)
    ->group(function ($db) {
        $db->where('post_title', get('q'), 'LIKE')
            ->or_where('post_content', get('q'), 'LIKE')
            ->or_where('post_short_content', get('q'), 'LIKE');
    })
    ->groupby('posts.post_ID')
    ->orderby('post_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('blog-search');
