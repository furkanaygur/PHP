<!doctype html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title><?= setting('title') ?> | ADMIN</title>

    <!--styles-->
    <link rel="stylesheet" href="<?= adminPublicURl('styles/main.css') ?>">

    <!--scripts-->
    <script src="<?= adminPublicURl('scripts/jquery-1.12.2.min.js') ?>"></script>
    <!--    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
    <script src="<?= adminPublicURl('scripts/admin.js') ?>"></script>

</head>

<body>

    <!--navbar-->
    <div class="navbar">
        <ul dropdown>
            <li>
                <a href="#">
                    <span class="fa fa-home"></span>
                    <span class="title">
                        Furkan Aygur | CSM
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-comment"></span>
                    1
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="fa fa-plus"></span>
                    <span class="title">New</span>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            New Post
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            New Page
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            New Category
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!--sidebar-->
    <div class="sidebar">
        <ul>
            <?php foreach ($menus as $mainUrl => $menu) : ?>
                <li class="<?= (route(1) == $mainUrl) || isset($menu['submenu'][route(1)]) ? 'active' : null ?>">
                    <a href="<?= adminURL($mainUrl) ?>">
                        <span class="fa fa-<?= $menu['icon'] ?>"></span>
                        <span class="title">
                            <?= $menu['title'] ?>
                        </span>
                    </a>
                    <?php if (isset($menu['submenu'])) : ?>
                        <ul class="sub-menu ">
                            <?php foreach ($menu['submenu'] as $url => $title) : ?>
                                <li class="<?= (route(1) == $url ? 'active' : null) ?>">
                                    <a href="<?= adminURL($url) ?>">
                                        <?= $title ?>

                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="../index">
                    <span class="fa fa-times-circle"></span>
                    <span class="title">
                        Go Back Site
                    </span>
                </a>
            </li>
            <li class="line">
                <span></span>
            </li>
        </ul>
        <a href="#" class="collapse-menu">
            <span class="fa fa-arrow-circle-left"></span>
            <span class="title">
                Collapse menu
            </span>
        </a>


    </div>

    <!--content-->
    <div class="content">