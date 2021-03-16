<?php

if (permission('reference', 'edit')) {
    permissionPage();
}

$id = get('id');
if (!$id) {
    header('Location:' . adminURL('reference'));
    exit;
}

$row = $db->from('reference_images')->join('reference', '%s.reference_ID = %s.image_reference_ID')
    ->where('image_ID', $id)->first();

if (!$row) {
    header('Location:' . adminURL('reference'));
    exit;
}


if (post('submit')) {
    $image_content = post('image_content');
    $data['image_content'] = json_encode($image_content);

    if ($_FILES['image']['name']) {
        $handle = new upload($_FILES['image']);
        if ($handle->uploaded) {
            $handle->file_new_name_body = $row['reference_url'] . '_' . rand(1, 9999);
            $handle->image_resize = true;
            $handle->image_x = 1280;
            $handle->image_ratio_y = true;
            $handle->allowed = ['image/*'];
            $handle->process(PATH . '/upload/reference/' . $row['reference_url']);
            if ($handle->processed) {
                unlink(PATH . '/upload/reference/' . $row['reference_url'] . '/' . $row['image_url']);
                $data['image_url'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
            } else {
                $error = $handle->error;
            }
        } else {
            $error = 'File could not upload';
        }
    }
    $upload = $db->update('reference_images')->where('image_ID', $id)->set($data);
    if ($upload) {
        header('Location:' . adminURL('reference-images?id=' . $row['reference_ID']));
        exit;
    } else {
        $error = 'File could not upload';
    }
}

$content = json_decode($row['image_content'] ? $row['image_content'] : null, true);

require adminView('edit-reference-image');
