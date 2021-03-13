<?php

if (permission('posts', 'add')) {
    permissionPage();
}

$categories = $db->from('categories')->orderby('category_name', 'ASC')->all();

$allTags = $db->from('tags')->orderby('tag_ID', 'DESC')->all();

$tagsArr = [];
foreach ($allTags as $key => $tag) {
    $tagsArr[] = trim(htmlspecialchars($tag['tag_name']));
}

if (post('submit')) {
    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_short_content = post('post_short_content');
    $post_content = post('post_content');
    $post_categories = post('post_categories');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));
    $post_status = post('post_status');
    if (!$post_title || !$post_short_content || !$post_content || !$post_status || empty($post_categories)) {
        $error = 'Please enter a post name and content or post status or post category';
    } else {
        $post_categories = implode(',', post('post_categories'));

        $query = $db->from('posts')->where('post_url', $post_url)
            ->first();

        if ($query) {
            $error = 'This post exist already';
        } else {
            $query = $db->insert('posts')->set([
                'post_title' => $post_title,
                'post_url' => $post_url,
                'post_short_content' => $post_short_content,
                'post_content' => $post_content,
                'post_categories' => $post_categories,
                'post_seo' => $post_seo,
                'post_status' => $post_status
            ]);

            if ($query) {
                $post_ID = $db->lastId();
                $post_tags = explode(',', $post_tags);
                foreach ($post_tags as $tag) {

                    $row = $db->from('tags')->where('tag_url', permalink($tag))->first();

                    // is tag exist ? 
                    if (!$row) {
                        $tagInsert = $db->insert('tags')->set([
                            'tag_name' => $tag,
                            'tag_url' => permalink($tag)
                        ]);
                        $tagID = $db->lastId();
                    } else {
                        $tagID = $row['tag_ID'];
                    }

                    // Does post have a tag? 
                    $tags = $db->from('post_tags')
                        ->where('post_tag_ID', $post_ID)
                        ->where('tag_ID', $tagID)
                        ->first();

                    if (empty($tags)) {
                        $query = $db->insert('post_tags')->set([
                            'post_tag_ID' => $post_ID,
                            'tag_ID' => $tagID
                        ]);
                    }
                }
                header('Location:' . adminURL('posts'));
            } else {
                $error = 'Error';
            }
        }
    }
}

require adminView('add-post');
