<?php
if (permission('contact', 'edit')) {
    permissionPage();
}

$id = get('id');

if (!$id) {
    header('Location:' . adminURL('contact'));
    exit;
}

$row = $db->from('contact')->join('users', '%s.user_ID = %s.contact_read_user', 'left')->where('contact_ID', $id)->first();

if (!$row) {
    header('Location:' . adminURL('contact'));
    exit;
}

if ($row['contact_read'] == 0) {
    $db->update('contact')->where('contact_ID', $id)->set([
        'contact_read' => 1,
        'contact_read_date' => date('Y-m-d H:i:s'),
        'contact_read_user' => session('user_ID')
    ]);
}



require adminView('edit-contact');
