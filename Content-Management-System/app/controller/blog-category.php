<?php

$category_url = route(2);
if (!$category_url) {
    header('Location:' . siteURL('404'));
    exit;
}

$row = $db->from('categories')->where('category_url', $category_url)->first();

if (!$row) {
    header('Location:' . siteURL('404'));
    exit;
}

$seo = json_decode($row['category_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $row['category_name'],
    'description' => $seo['description'] ? $seo['description'] : null
];


$totalRecord = $db->from('posts')
    ->select('count(post_ID) as total')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->findInSet('post_categories', $row['category_ID'])
    ->where('post_status', 2)
    ->groupby('posts.post_ID')
    ->total();
$pageLimit = 1;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);


$query = $db->from('posts')->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->where('post_status', 2)
    ->findInSet('post_categories', $row['category_ID'])
    ->groupby('posts.post_ID')
    ->orderby('post_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();



require view('blog-category');
