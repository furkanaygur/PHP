<?php require view('static/header') ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?= setting('welcome_title') ? setting('welcome_title') : 'Welcome!' ?></h1>
        <p class="lead text-muted"><?= setting('welcome_text') ? setting('welcome_text') : 'Here it is Furkan\'s Site' ?></p>
        <p>
            <a href="<?= siteURL('blog/') ?>" class="btn btn-primary my-2">Blog</a>
            <a href="<?= siteURL('contact/') ?>" class="btn btn-secondary my-2">Contact</a>
        </p>
    </div>
</section>
<div class="container">
    <div class="row pb-2">
        <div class="col-md-12">
            <h4 class="pb-3">What am i doing?</h4>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Software Engineer</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Engineer</h6>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, consequatur.</p>
                    <a href="#" class="btn btn-sm btn-danger">Check Out <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Programmer</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Programmer</h6>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, ducimus?.</p>
                    <a href="#" class="btn btn-sm btn-primary">Check Out <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Developer</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Engineer</h6>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quisquam.</p>
                    <a href="#" class="btn btn-sm btn-dark">Check Out <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php require view('static/footer'); ?>
</div>

</body>

</html>