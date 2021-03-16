<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1> Search Results</h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">

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
                                <?php if ($currentPageCount != $db->prevPage()) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= siteURL('blog-search/?q=' . get('q') .  '&' . $pageParam . '=' . $db->prevPage()) ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?= $db->showPagination(siteURL('blog-search/?q=' . get('q') .  '&' . $pageParam . '=[page]')) ?>
                                <?php if ($currentPageCount != $db->nextPage()) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= siteURL('blog-search/?q=' . get('q') .  '&' . $pageParam . '=' . $db->nextPage()) ?>" aria-label="Next">
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
    </div>

    <?php require view('static/footer'); ?>