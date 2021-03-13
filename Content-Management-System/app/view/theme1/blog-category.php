<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['category_name'] ?></h1>
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

                <?php if ($totalRecord > $pageLimit) : ?>
                    <div class="pagination-container text-center mb-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="<?= siteURL('blog?' . $pageParam . '=' . $db->prevPage()) ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>

                                <?= $db->showPagination(siteURL('blog?' . $pageParam . '=[page]')) ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?= siteURL('blog?' . $pageParam . '=' . $db->nextPage()) ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
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

                            <!-- <span class="badge badge-dark badge-pill">14</span> -->
                        </a>
                    </li>
                <?php endforeach; ?>
                <!-- <li class="list-group-item active">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        CSS
                        <span class="badge badge-dark badge-pill">2</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        Music
                        <span class="badge badge-dark badge-pill">1</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        Daily Life
                        <span class="badge badge-dark badge-pill">15</span>
                    </a>
                </li> -->
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Tags
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5</a>
            <a href="#" class="badge badge-light badge-pill">css</a>
            <a href="#" class="badge badge-light badge-pill">jquery</a>
            <a href="#" class="badge badge-light badge-pill">php</a>
            <a href="#" class="badge badge-light badge-pill">software</a>
            <a href="#" class="badge badge-light badge-pill">development</a>
        </div>
    </div>

    <?php require view('static/footer'); ?>