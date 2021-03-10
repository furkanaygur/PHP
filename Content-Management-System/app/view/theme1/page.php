<?php require view('static/header'); ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['page_title'] ?></h1>
    </div>
</section>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <?= htmlspecialchars_decode($row['page_content']) ?>
        </div>

    </div>
    <?php require view('static/footer'); ?>