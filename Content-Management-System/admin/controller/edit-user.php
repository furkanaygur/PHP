<?php
if (permission('users', 'edit')) {
    permissionPage();
}

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
    if ($data = form_control('user_permissions')) {
        $data['user_url'] = permalink($data['user_name']);
        $data['user_permissions'] = json_encode($_POST['user_permissions']);

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

$userPermissions = User::permission($row['user_ID']);

$permissions = json_decode($userPermissions['user_permissions'], true);

require adminView('edit-user');
