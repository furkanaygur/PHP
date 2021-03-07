<div class="container">
    <div class="row">
        <div class="col-md-12">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <i class="fab fa-bootstrap fa-2x"></i>
                        <small class="d-block mb-3 text-muted">© 1993-2021</small>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Cool stuff</a></li>
                            <li><a class="text-muted" href="#">Random feature</a></li>
                            <li><a class="text-muted" href="#">Team feature</a></li>
                            <li><a class="text-muted" href="#">Stuff for developers</a></li>
                            <li><a class="text-muted" href="#">Another one</a></li>
                            <li><a class="text-muted" href="#">Last time</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md pr-5">
                        <h5>About</h5>
                        <p class="small">
                            <?= setting('footer_about') ?>

                        </p>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Soical Media</h5>
                        <ul class="list-unstyled text-small">
                            <?php if (setting('soical_facebook_name')) : ?>
                                <li><a class="text-muted" href="<?= setting('soical_facebook') ? setting('soical_facebook') : '#' ?>"><i class="fab fa-facebook-square"></i> <?= setting('soical_facebook_name') ?></a></li>
                            <?php endif; ?>
                            <?php if (setting('soical_twitter_name')) : ?>
                                <li><a class="text-muted" href="<?= setting('soical_twitter') ? setting('soical_twitter') : '#' ?>"><i class="fab fa-twitter-square"></i> furkanaygur</a></li>
                            <?php endif; ?>
                            <?php if (setting('soical_instagram_name')) : ?>
                                <li><a class="text-muted" href="<?= setting('soical_instagram') ? setting('soical_instagram') : '#' ?>"><i class="fab fa-instagram"></i> furkanaygur</a></li>
                            <?php endif; ?>
                            <?php if (setting('soical_linkedin_name')) : ?>
                                <li><a class="text-muted" href="<?= setting('soical_linkedin') ? setting('soical_linkedin') : '#' ?>""><i class=" fab fa-linkedin"></i> furkanaygur</a></li>
                            <?php endif; ?>
                            <?php if (setting('soical_github_name')) : ?>
                                <li><a class="text-muted" href="<?= setting('soical_github') ? setting('soical_github') : '#' ?>""><i class=" fab fa-github"></i> furkanaygur</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>