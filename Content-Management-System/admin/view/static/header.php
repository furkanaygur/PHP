<!doctype html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title><?= setting('title') ?> | ADMIN</title>

    <!--styles-->
    <link rel="stylesheet" href="<?= adminPublicURL('styles/main.css?v') . time() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!--scripts-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!--    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
    <script>
        var api_url = '<?= adminURL('api') ?>'
    </script>
    <script src="<?= adminPublicURL('scripts/api.js') ?>"></script>
    <script src="<?= adminPublicURL('scripts/admin.js') ?>"></script>


    <style>
        .handle {
            width: 25px;
            height: 20px;
            background: #ccc;
            position: absolute;
            top: 0;
            right: -25px;
            display: flex;
            align-items: center;
            cursor: move;
        }

        .handle span {
            position: absolute;
            height: 3px;
            width: 25px;
            background: black;
            cursor: move;
        }

        .handle span:before,
        .handle span:after {
            content: '';
            position: absolute;
            height: 3px;
            width: 25px;
            background: black;
        }

        .handle span:before {
            top: -10px;
        }

        .handle span:after {
            bottom: -10px;
        }

        .menu-container form>ul li {
            background-color: #f5f5f5;
            overflow: inherit;
        }

        .menu-container form>ul li.ui-sortable-helper {
            box-shadow: 0 0 25px 0 rgba(0, 0, 0, .5);
        }

        .ui-sortable-placeholder {
            background-color: #f7faa0 !important;
            visibility: visible !important;
        }

        .success-msg {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: green;
            text-align: center;
            box-sizing: border-box;
            font-size: 18px;
            color: #fff;
            padding: 20px;
            z-index: 100;
            font-weight: 300;
        }

        .success-close-btn {
            position: absolute;
            top: 18px;
            right: 20px;
            color: #fff;
            font-size: 20px;
        }
    </style>

</head>

<body>
    <div class="success-msg">
        <a href="#" class="success-close-btn"><i class="fa fa-times"></i> </a>
        <div>Succsessfully</div>
    </div>

    <?php if (session('user_rank') && session('user_rank') != 3) : ?>
        <!--navbar-->
        <div class="navbar">
            <ul dropdown>
                <li>
                    <a href="#">
                        <span class="fa fa-home"></span>
                        <span class="title">
                            <?= setting('title') ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?= adminURL('logout') ?>">
                        <span class="fas fa-sign-out-alt"></span>
                        <span class="title">
                            Logout
                        </span>
                    </a>
                </li>
                <!-- <li>
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
                </li> -->
            </ul>
        </div>

        <!--sidebar-->
        <div class="sidebar">
            <ul>
                <?php if (isset($menus)) : ?>
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
                <?php endif; ?>
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

        <div class="content">

            <?php if ($err = error()) : ?>
                <div class="message error box-">
                    <?= $err ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>