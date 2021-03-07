<?php require view('static/header'); ?>
<div class="container">
    <div class="row justify-content-md-center mt-4">

        <div class="col-md-4">
            <form action="" method="post">
                <h3 class="mb-3">Login</h3>
                <?php if ($succ = success()) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $succ ?>
                    </div>
                <?php endif; ?>
                <?php if ($err = error()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $err ?>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username..." value="<?= isset($username) ? $username : '' ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <input type="hidden" name="submit" value="1">
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
    <?php require view('static/footer'); ?>