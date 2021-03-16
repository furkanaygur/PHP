<?php

if (permission('reference', 'add')) {
    permissionPage();
}

$categories = $db->from('reference_categories')->orderby('category_name', 'ASC')->all();

if (post('submit')) {
    if ($data = form_control('reference_url', 'reference_seo')) {
        $data['reference_seo'] = json_encode($data['reference_seo']);
        $data['reference_categories'] = implode(',', $data['reference_categories']);
        if (!$data['reference_url']) {
            $data['reference_url'] = permalink($data['reference_title']);
        }

        $query = $db->from('reference')->where('reference_url', $data['reference_url'])->first();

        if ($query) {
            $error = 'That reference exist already!';
        } else {
            if (@mkdir(PATH . '/upload/reference/' . $data['reference_url'], 0777)) {
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
                        $data['reference_image'] = $handle->file_dst_name_body . '.' . $handle->file_dst_name_ext;
                    } else {
                        $error = $handle->error;
                    }
                } else {
                    $error = 'Please upload reference image';
                }
            } else {
                $error = '<strong>' . PATH . '/upload/reference/' . $data['reference_url'] . '</strong> this directory already exists';
            }

            if (!isset($error)) {
                $insert = $db->insert('reference')->set($data);
                if ($insert) {
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

require adminView('add-reference');
