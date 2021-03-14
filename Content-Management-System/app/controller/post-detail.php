<?php
$row = Blog::FindPost($post_url);

if (empty($row['post_ID'])) {
    header('Location:' . siteURL('404'));
    exit;
}

$seo = json_decode($row['post_seo'], true);

$meta = [
    'title' => $seo['title'] ? $seo['title'] : $row['post_title'],
    'description' => $seo['description'] ? $seo['description'] : null
];

// comments
$comments = $db->from('comments')->where('comment_post_ID', $row['post_ID'])
    ->where('comment_status', 2)
    ->orderby('comment_ID', 'ASC')
    ->all();


require view('post-detail');
