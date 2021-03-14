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

// $sql = $db->prepare('SELECT count(DISTINCT post_ID) as total FROM posts INNER JOIN categories ON FIND_IN_SET(categories.category_ID, posts.post_categories) WHERE post_status = "2" && FIND_IN_SET( posts.post_categories, :category_ID)');
// $sql->execute([
//     'category_ID' => $row['category_ID']
// ]);
// $totalRecord = $sql->fetch(PDO::FETCH_ASSOC);
// $totalRecord = $totalRecord['total'];

$totalRecord = $db->from('posts')
    ->select('count(DISTINCT post_ID) as total')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->where('post_status', 2)
    ->find_in_set('posts.post_categories', $row['category_ID'])
    ->total();

$pageLimit = 1;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$currentPageCount = !empty($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : 1;
$currentPageCount = is_array($currentPageCount) ? $currentPageCount[1] : $currentPageCount;

$query = $db->from('posts')
    ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
    ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
    ->where('post_status', 2)
    ->find_in_set('post_categories', $row['category_ID'])
    ->groupby('posts.post_ID')
    ->orderby('post_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();


require view('blog-category');
