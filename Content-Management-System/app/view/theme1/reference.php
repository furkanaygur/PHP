<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1>References</h1>
    </div>
</section>

<div class="portfolio">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <nav class="nav nav-pills nav-fill mb-4">
                    <a class="nav-item nav-link <?= !route(1) ? ' active' : null ?>" href="<?= siteURL('reference') . '/' ?>">All</a>
                    <?php foreach ($categories as $cat) : ?>
                        <a class="nav-item nav-link <?= route(1) == $cat['category_url'] ? ' active' : null ?>" href="<?= siteURL('reference/' . $cat['category_url']) ?>"><?= $cat['category_name'] ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>

        <?php if ($query) : ?>
            <div class="row">
                <?php foreach ($query as $row) : ?>
                    <div class="col-md-4">
                        <a href="<?= siteURL('reference-detail/' . $row['reference_url']) ?>">
                            <img height="300" class="img-rounded" src="<?= siteURL('/upload/reference/' . $row['reference_url'] . '/' . $row['reference_image']) ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="alert alert-warning">
                There is no post
            </div>
        <?php endif; ?>
        <?php require view('static/footer'); ?>