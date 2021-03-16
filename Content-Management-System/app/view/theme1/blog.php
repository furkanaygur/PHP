<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1>Blog</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Recent Topics</h4>
            <?php if ($query) : ?>
                <?php foreach ($query as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $post['category_name'] ?>
                            <div class="date">
                                <?= timeConvert($post['post_date']) ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['post_title'] ?></h5>
                            <p class="card-text">
                                <?= html_entity_decode($post['post_content']) ?>
                            </p>
                            <a href="<?= siteURL('blog/') . $post['post_url'] ?>" class="btn btn-dark">Read</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($totalRecord >= $pageLimit) : ?>
                    <div class="pagination-container text-center mb-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if ($currentPageCount != $db->prevPage()) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= siteURL('blog?' . $pageParam . '=' . $db->prevPage()) ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?= $db->showPagination(siteURL('blog?' . $pageParam . '=[page]')) ?>

                                <?php if ($currentPageCount != $db->nextPage()) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= siteURL('blog?' . $pageParam . '=' . $db->nextPage()) ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="alert alert-warning"> <strong> There is no blog post</strong> </div>
            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Categories
            </h4>
            <ul class="list-group mb-4">
                <?php foreach (Blog::Categories() as $category) : ?>
                    <li class="list-group-item">
                        <a href=" <?= siteURL('blog/category/') . $category['category_url'] ?>" style="color: #333;" class="d-flex justify-content-between align-items-center">
                            <?= $category['category_name'] ?>

                            <span class="badge badge-dark badge-pill"><?= $category['total'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Tags
            </h4>

            <?php foreach (Blog::getRandomTags(10) as $tag) : ?>
                <a href="<?= siteURL('blog/tag/' . $tag['tag_url']) ?>" class="badge badge-light badge-pill"><?= $tag['tag_name'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require view('static/footer'); ?>