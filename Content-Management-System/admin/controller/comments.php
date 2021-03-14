<?php

if (permission('comments', 'view')) {
    permissionPage();
}
$totalRecord = $db->from('comments')
    ->select('count(comment_ID) as total');
if ($status = get('status')) {
    $totalRecord = $db->where('comment_status', ($status == 1 ? 1 : $status));
}
$totalRecord = $db->total();
$pageLimit = 2;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

$query = $db->from('comments')
    ->join('posts', '%s.post_ID = %s.comment_post_ID')
    ->join('users', '%s.user_ID = %s.comment_user_ID', 'left');
if ($status = get('status')) {
    $query = $db->where('comment_status', ($status == 1 ? 1 : $status));
}
$query = $db->orderby('comment_ID', 'DESC')
    ->limit($pagination['start'], $pagination['limit'])
    ->all();



require adminView('comments');
