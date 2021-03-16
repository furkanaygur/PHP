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

$categories = $db->from('reference_categories')->orderby('category_name', 'ASC')->all();

if (post('submit')) {
    if ($data = form_control('reference_url', 'reference_seo')) {
        $data['reference_seo'] = json_encode($data['reference_seo']);
        $data['reference_categories'] = implode(',', $data['reference_categories']);
        if (!$data['reference_url']) {
            $data['reference_url'] = permalink($data['reference_title']);
        }

        $query = $db->from('reference')->where('reference_url', $data['reference_url'])
            ->where('reference_ID', $id, '!=')->first();

        if ($query) {
            $error = 'That reference exist already!';
        } else {

            if ($data['reference_url'] != $row['reference_url']) {
                rename(PATH . '/upload/reference/' . $row['reference_url'], PATH . '/upload/reference/' . $data['reference_url']);
            }

            $handle = new upload($_FILES['reference_image']);
            if ($handle->uploaded) {
                $handle->file_new_name_body = $data['reference_url'] . '_' . rand(1, 9999);
                $handle->image_ratio_crop = true;
                $handle->image_resize = true;
                $handle->image_ratio_fill = true;
                $handle->image_x = 500;
                $handle->image_y = 300;
                $handle->allowed = ['image/*'];
                $handle->process(PATH . '/upload/reference/' . $data['reference_url']);
                if ($handle->processed) {
                    unlink(PATH . '/upload/reference/' . $data['reference_url'] . '/' . $row['reference_image']);
                    $data['reference_image'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                } else {
                    $error = $handle->error;
                }
            } else {
                $data['reference_image'] = $row['reference_image'];
            }

            if (!isset($error)) {
                $update = $db->update('reference')
                    ->where('reference_ID', $id)->set($data);
                if ($update) {
                    header('Location:' . adminURL('reference'));
                } else {
                    $error = 'Error';
                }
            }
        }
    } else {
        $error = 'Please fill all inputs';
    }
}

$seo = json_decode($row['reference_seo'], true);

require adminView('edit-reference');
