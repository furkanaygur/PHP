<?php
$id = get('id');

if (!$id) {
    header('Location:' . adminURL('users'));
    exit;
}

$row = $db->from('users')->where('user_ID', $id)->first();

if (!$row) {
    header('Location:' . adminURL('users'));
    exit;
}


if (post('submit')) {
    if ($data = form_control('user_email')) {
        $data['user_url'] = permalink($data['user_name']);

        $query = $db->update('users')->where('user_ID', $id)->set($data);
        if ($query) {
            header('Location:' . adminURL('users'));
        } else {
            $error = 'Error';
        }
    } else {

        $error = 'Please fill in all inputs';
    }
}

require adminView('edit-user');
