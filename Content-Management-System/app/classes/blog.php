<?php

class Blog
{
    public static function Categories()
    {
        global $db;
        $query = $db->from('categories')
            ->select('categories.* , COUNT(category_ID) as total')
            ->join('posts', 'FIND_IN_SET(category_ID, post_categories)')
            ->groupby('category_ID')
            ->orderby('category_order', 'ASC')->all();
        return $query;
    }

    public static function FindPost($post_url)
    {
        global $db;
        return $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'FIND_IN_SET(category_ID, post_categories)')
            ->where('post_url', $post_url)->where('post_status', 2)->first();
    }

    public static function FindPostByID($postID)
    {
        global $db;
        return $db->from('posts')->where('post_ID', $postID)->where('post_status', 2)->first();
    }
}
