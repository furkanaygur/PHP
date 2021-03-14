<?php require view('static/header'); ?>

<style>
    html {
        scroll-behavior: smooth;
    }

    .share {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .share a {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .share a:hover {
        text-decoration: none !important;
    }
</style>

<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['post_title'] ?></h1>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-3">
                <div class="card-header">
                    <?= $row['category_name'] ?>
                    <div class="date">
                        <?= $row['post_date'] . ' (' . timeConvert($row['post_date']) . ')'  ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= htmlspecialchars_decode($row['post_content']) ?>
                </div>
            </div>

            <div class="card text-center mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="true">Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="share-tab" data-toggle="tab" href="#share" role="tab" aria-controls="share" aria-selected="false">Share</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="home-tab">
                            <?php if ($comments) : ?>
                                <?php foreach ($comments as $comment) require view('static/comments') ?>
                            <?php else : ?>
                                <div id="no-comments">
                                    <h5 class="card-title">Write Frist Comment!</h5>
                                    <p class="card-text">There are no comments for this blog, write frist comment!</p>
                                    <a href="#add-comment" class="btn btn-primary">Comment</a>
                                </div>
                                <div id="comments"></div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="share mb-4">
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= siteURL('blog/' . $row['post_url']) ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="Share onFacebook">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= siteURL('blog/' . $row['post_url']) ?>&text=" class="twitter" data-toggle="tooltip" data-placement="top" title="Tweet">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a target="_blank" href="#" class="gplus" data-toggle="tooltip" data-placement="top" title="Share on Google+">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                                <a target="_blank" href="#" class="linkedin" data-toggle="tooltip" data-placement="top" title="Share on Linkedin">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                                <a target="_blank" href="#" class="whatsapp" data-toggle="tooltip" data-placement="top" title="Whatsapp">
                                    <span class="fab fa-whatsapp"></span>
                                </a>
                                <a target="_blank" href="mailto:furkan.aygur.1" class="mail" data-toggle="tooltip" data-placement="top" title="E-mail">
                                    <span class="fa fa-envelope"></span>
                                </a>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" onclick="this.select()" value="<?= siteURL('blog/' . $row['post_url']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="add-comment">
                <div class="card-header">
                    Comment
                </div>
                <div class="card-body">
                    <form onsubmit="return false;" id="comment-form" data-id="<?= $row['post_ID'] ?>">
                        <div id="comment-msg" style="display: none;">
                            furkan
                        </div>
                        <?php if (!session('user_name')) : ?>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Name - Surname</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        <?php else : ?>
                            <div class="alert alert-info">
                                You are commenting as <strong><?= session('user_name') ?></strong>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="content">Comment</label>
                            <textarea name="content" id="comment" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" onclick="addComment('#comment-form')" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require view('static/footer'); ?>