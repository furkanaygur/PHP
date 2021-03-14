<?php

if (permission('comments', 'edit')) {
    permissionPage();
}

$id = get('id');
if (!$id) {
    header('Location:' . adminURL('comments'));
    exit;
}

$row = $db->from('comments')
    ->join('users', '%s.user_ID = %s.comment_user_ID')
    ->join('posts', '%s.post_ID = %s.comment_post_ID')->where('comment_ID', $id)->first();

if (!$row) {
    header('Location:' . adminURL('comments'));
    exit;
}

if (post('submit')) {
    $comment_name = post('comment_name');
    $comment_email = post('comment_email');
    $comment_content =  post('comment_content');
    $comment_status = post('comment_status');
    if (!$comment_name || !$comment_email || !$comment_content) {
        $error = 'Please enter all inputs';
    } else {

        $query = $db->update('comments')
            ->where('comment_ID', $id)
            ->set([
                'comment_name' => $comment_name,
                'comment_email' => $comment_email,
                'comment_content' => $comment_content,
                'comment_status' => $comment_status
            ]);

        if ($query) {
            header('Location:' . adminURL('comments'));
        } else {
            $error = 'Error';
        }
    }
}

require adminView('edit-comment');
