<?php

if (permission('tags', 'edit')) {
    permissionPage();
}

$id = get('id');
if (!$id) {
    header('Location:' . adminURL('tags'));
    exit;
}

$row = $db->from('tags')->where('tag_ID', $id)->first();
if (!$row) {
    header('Location:' . adminURL('tags'));
    exit;
}


if (post('submit')) {
    $tag_name = post('tag_name');
    $tag_url = permalink(post('tag_url'));
    if (!post('tag_url')) {
        $tag_url = permalink($tag_name);
    }
    $tag_seo = json_encode(post('tag_seo'));
    if (!$tag_name) {
        $error = 'Please enter a tag name';
    } else {
        $query = $db->from('tags')->where('tag_url', $tag_url)
            ->where('tag_url', $ptag_url)
            ->where('tag_ID', $id, '!=')
            ->first();

        if ($query) {
            $error = 'This tag exist already';
        } else {
            $query = $db->update('tags')
                ->where('tag_ID', $id)
                ->set([
                    'tag_name' => $tag_name,
                    'tag_url' => $tag_url,
                    'tag_seo' => $tag_seo
                ]);

            if ($query) {
                header('Location:' . adminURL('tags'));
            } else {
                $error = 'Error';
            }
        }
    }
}


$seo = json_decode($row['tag_seo'], true);

require adminView('edit-tag');
