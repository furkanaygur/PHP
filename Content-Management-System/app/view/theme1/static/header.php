<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($meta['title']) ? $meta['title'] : 'Furkan Aygur' ?></title>
    <?php if (isset($meta['description'])) : ?>
        <meta name="description" content="<?= $meta['description'] ?>">
    <?php endif; ?>
    <?php if (isset($meta['keywords'])) : ?>
        <meta name="keywords" content="<?= $meta['keywords'] ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var api_url = '<?= siteURL('api') ?>';
    </script>
    <script src="<?= publicURL('scripts/api.js') ?>"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= publicURL('styles/main.css') ?>">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= siteURL() ?>">FURKANAYGUR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php foreach (menu(9) as $key => $menu) : ?>
                        <li class="nav-item active <?= isset($menu['submenu']) ? 'dropdown' : '' ?>">
                            <a class="nav-link <?= isset($menu['submenu']) ? 'dropdown-toggle' : '' ?> " href="<?= $menu['url'] ?>" <?= isset($menu['submenu']) ? 'id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : '' ?>>
                                <?= $menu['title'] ?>
                            </a>
                            <?php if (isset($menu['submenu'])) : ?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($menu['submenu'] as $k => $submenu) : ?>
                                        <a class="dropdown-item" href="<?= $submenu['url'] ?>"><?= $submenu['title'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            References
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Web Design</a>
                            <a class="dropdown-item" href="#">Web Software</a>
                            <a class="dropdown-item" href="#">Mobil Application</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0 mr-1">
                    <input class="form-control mr-sm-2" type="search" placeholder="<?= setting('search_placeholder') ?>" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php if (session('user_ID')) : ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= session('user_name') ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= siteURL('profile') ?>">Profile</a>
                            <a class="dropdown-item" href="<?= siteURL('logout') ?>">Logout</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= siteURL('login') ?>">Login</a>
                            <a class="dropdown-item" href="<?= siteURL('register') ?>">Register</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>