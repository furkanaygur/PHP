<?php

$name = post('name');
$email = post('email');
$postID = post('post_ID');
$content = post('content');

if (session('user_name')) {
    $name = session('user_name');
    $email = session('user_email');
}

if (!$name || !$email || !$postID) {
    echo $name . ' ' . $email . ' ' . $postID;
    $json['error'] = 'Please enter a name or email please';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $json['error'] = 'Please enter valid email';
} else {
    if (session('user_ID')) {
        $status = setting('user_comment') == 1 ? 1 : 2;
    } else {
        $status = setting('visitor_comment') == 1 ? 1 : 2;
    }

    $row = BLOG::FindPostByID($postID);
    if (!$row) {
        $json['error'] = 'Error';
    } else {
        $comment = [
            'comment_user_ID' => session('user_ID'),
            'comment_post_ID' => $postID,
            'comment_name' => $name,
            'comment_email' => $email,
            'comment_content' => $content,
            'comment_status' => $status
        ];
        $insert = $db->insert('comments')->set($comment);

        if ($insert) {
            if ($status == 1) {
                $json['success'] = 'Successfuully added wait for approval Thank You!';
            } else {

                $comment['comment_date'] = date('Y-m-d H:i:s');

                ob_start();
                require view('static/comments');
                $output = ob_get_clean();

                $json['comment'] = $output;
            }
        } else {
            $json['error'] = 'an Error';
        }
    }
}
