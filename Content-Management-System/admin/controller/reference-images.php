<?php
if (permission('reference', 'edit')) {
    permissionPage();
}

$id = get('id');
if (!$id) {
    header('Location:' . adminURL('reference'));
    exit;
}

$row = $db->from('reference')->where('reference_ID', $id)->first();

if (!$row) {
    header('Location:' . adminURL('reference'));
    exit;
}

if (post('submit')) {
    if (array_filter($_FILES['images']['name'])) {
        $files = [];
        foreach ($_FILES['images'] as $file_key => $values) {
            foreach ($values as $index => $image) {
                $files[$index][$file_key] = $image;
            }
        }

        foreach ($files as $file) {
            $handle = new upload($file);
            if ($handle->uploaded) {
                $handle->file_new_name_body = $row['reference_url'] . '_' . rand(1, 9999);
                $handle->image_resize = true;
                $handle->image_ratio_fill = true;
                $handle->image_x = 1280;
                $handle->image_ratio_y = true;
                $handle->allowed = ['image/*'];
                $handle->process(PATH . '/upload/reference/' . $row['reference_url']);
                if ($handle->processed) {
                    $img = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                    $insert = $db->insert('reference_images')->set([
                        'image_reference_ID' => $id,
                        'image_url' => $img
                    ]);
                } else {
                    $error = $handle->error;
                }
            }
        }

        header('Location:' . adminURL('reference-images?id=' . $id));
    } else {
        $error = 'Please upload image files';
    }
}

$query = $db->from('reference_images')->where('image_reference_ID', $id)
    ->orderby('image_ID', 'DESC')->all();


require adminView('reference-images');
