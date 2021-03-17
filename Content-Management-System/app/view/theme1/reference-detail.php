<?php require view('/static/header') ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['reference_title'] ?></h1>
    </div>
</section>

<div class="portfolio">
    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i < count($images); $i++) : ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : null ?>"></li>
                        <?php endfor; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($images as $key => $image) : ?>
                            <div class="carousel-item <?= $key == 0 ? 'active' : null ?>">
                                <img height="400" class="d-block w-100" src="<?= siteURL('upload/reference/' . $row['reference_url'] . '/' . $image['image_url']) ?>" alt="First slide">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card mb-3">
                    <div class="card-header">
                        About Project
                    </div>
                    <div class="card-body">
                        <?= htmlspecialchars_decode($row['reference_content']) ?>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Tags
                    </div>
                    <div class="card-body">
                        <?php foreach (explode(',', $row['reference_tags']) as $tag) ?>
                        <span class="badge badge-pill badge-secondary"><?= $tag ?></span>
                    </div>
                </div>

                <?php if (!empty($row['reference_demo'])) : ?>
                    <div div class="card">
                        <div class="card-header">
                            Project Link
                        </div>
                        <div class="card-body">
                            <a href="<?= $row['reference_demo'] ?>" target="_blank" class="btn btn-primary">
                                Check out
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
        <?php require view('/static/footer'); ?>