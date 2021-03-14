<?php

if (permission('tags', 'add')) {
    permissionPage();
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
            ->first();

        if ($query) {
            $error = 'This tag exist already';
        } else {
            $query = $db->insert('tags')
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

require adminView('add-tag');
