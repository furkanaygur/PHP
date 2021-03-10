<?php
$page_url = route(1);
if (!$page_url) {
    header('Location:' . siteURL('404'));
    exit;
}


$row = $db->from('pages')->where('page_url', $page_url)->first();

if (!$row) {
    header('Location:' . siteURL('404'));
    exit;
}

$seo = json_decode($row['page_seo'], true);

$meta = [
    'title' => $seo['title'] ? strtoupper($seo['title']) : strtoupper($row['page_title']),
    'description' => $seo['description'] ? $seo['description'] : $row['description']
];

require view('page');
