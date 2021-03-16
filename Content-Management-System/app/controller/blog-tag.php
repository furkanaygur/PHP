<?php

$tag_url = route(2);
if (!$tag_url) {
    header('Location:' . siteURL('404'));
    exit;
}

$row = $db->from('tags')->where('tag_url', $tag_url)->first();

if (!$row) {
    header('Location:' . siteURL('404'));
    exit;
}

$seo = json_decode($row['tag_seo'], true);

$meta = [
    'title' => !empty($seo['title']) ? $seo['title'] : $row['tag_name'],
    'description' => !empty($seo['description']) ? $seo['description'] : null
];


$totalRecord = $db->from('post_tags')
    ->select('count(DISTINCT ID) as total')
    ->where('tag_ID', $row['tag_ID'])
    ->total();

$pageLimit = 1;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$currentPageCount = !empty($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : 1;
$currentPageCount = is_array($currentPageCount) ? $currentPageCount[1] : $currentPageCount;

$query = $db->from('post_tags')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('posts', '%s.post_ID = %s.post_tag_ID')
    ->join('categories', 'FIND_IN_SET(categories.category_ID  , posts.post_categories)')
    ->where('tag_ID', $row['tag_ID'])
    ->groupby('posts.post_ID')
    ->orderby('post_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();

require view('blog-tag');
