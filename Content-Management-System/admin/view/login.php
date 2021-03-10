<?php require adminView('/static/header'); ?>

<div class="login-screen">
    <?php if ($err = error()) : ?>
        <div class="message error box-">
            <?= $err ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="user_name" value="<?= post('user_name') ? post('user_name') : null ?>" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="submit" value="1">Login</button>
            </li>
        </ul>
    </form>
    <div class="login-links">

        <a href="<?= URL . '/index' ?>">
            <span class="fa fa-long-arrow-left"></span> Back to the future?
        </a>
    </div>
</div>

<?php require adminView('static/footer'); ?>