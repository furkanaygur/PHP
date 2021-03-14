<?php

if (route(1) == 'category') {
    require controller('blog-category');
} else {

    if ($post_url = route(1)) {
        require controller('post-detail');
    } else {
        $meta = [
            'title' => 'Blog | Furkan Aygur',
        ];


        $totalRecord = $db->from('posts')
            ->select('count(post_ID) as total')
            ->total();
        $pageLimit = 1;
        $pageParam = 'page';
        $pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

        $currentPageCount = !empty($_SERVER['QUERY_STRING']) ? explode('=', $_SERVER['QUERY_STRING']) : 1;
        $currentPageCount = is_array($currentPageCount) ? $currentPageCount[1] : $currentPageCount;

        $query = $db->from('posts')->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'FIND_IN_SET(categories.category_ID, posts.post_categories)')
            ->where('post_status', 2)
            ->groupby('posts.post_ID')
            ->orderby('post_ID', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();

        // $sql = "SELECT posts.*, GROUP_CONCAT(category_name SEPARATOR \", \") as category_name, GROUP_CONCAT(category_url SEPARATOR \", \") as category_url FROM posts INNER JOIN categories ON FIND_IN_SET(categories.category_ID, posts.post_categories) GROUP BY posts.post_ID";
        // $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

        require view('blog');
    }
}
