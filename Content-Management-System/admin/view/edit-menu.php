<?php require adminView('/static/header'); ?>

<div class="box- menu-container">
    <h2>Edit Menu (#<?= $id ?>)</h2>
    <form action="" method="post">
        <div style="padding-bottom: 10px; max-width:400px">
            <input type="text" name="menu_title" value="<?= post('menu_title') ? post('menu_title') : $row['menu_title'] ?>" placeholder="Menu Title">
        </div>
        <ul id="menu" class="menu">
            <?php foreach ($menuData as $key => $menu) : ?>
                <li>
                    <div class="handle">
                        <span></span>
                    </div>
                    <div class="menu-item">
                        <a href="#" class="delete-menu">
                            <i class="fa fa-times"></i>
                        </a>
                        <input type="text" name="title[]" value="<?= $menu['title'] ?>" placeholder="Menu Name">
                        <input type="text" name="url[]" value="<?= $menu['url'] ?>" placeholder="Menu URL">
                    </div>
                    <div class="sub-menu">
                        <ul class="menu">
                            <?php if (isset($menu['submenu'])) : ?>
                                <?php foreach ($menu['submenu'] as $k => $submenu) : ?>
                                    <li>
                                        <div class="handle">
                                            <span></span>
                                        </div>
                                        <div class="menu-item">
                                            <a href="#" class="delete-menu">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <input type="text" placeholder="Menu Name" value="<?= $submenu['title'] ?>" name="sub_title_<?= $key ?>[]">
                                            <input type="text" placeholder="Menu URL" value="<?= $submenu['url'] ?>" name="sub_url_<?= $key ?>[]">
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <a href="#" class="btn add-submenu">Add Submenu</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="menu-btn">
            <a href="#" id="add-menu" class="btn ">Add Menu</a>
            <button type="submit" value="1" name="submit">Submit</button>
        </div>
    </form>
</div>



<script>
    $(function() {

        $('#add-menu').on('click', function(e) {
            $('#menu').append('<li>\n' +
                '                      <div class="handle">\n' +
                '                           <span></span>\n' +
                '                    </div>\n' +
                '                    <div class="menu-item">\n' +
                '                        <a href="#" class="delete-menu">\n' +
                '                            <i class="fa fa-times"></i>\n' +
                '                        </a>\n' +
                '                        <input type="text" name="title[]" placeholder="Menü Adı">\n' +
                '                        <input type="text" name="url[]" placeholder="Menü Linki">\n' +
                '                    </div>' +
                '                    <div class="sub-menu"><ul class="menu"></ul></div>\n' +
                '                    <a href="#" class="add-submenu btn">Alt Menü Ekle</a>\n' +
                '                </li>');
            e.preventDefault();
        });

        $(document.body).on('click', '.add-submenu', function(e) {
            var index = $(this).closest('li').index();
            $(this).prev('.sub-menu').find('ul').append('<li>\n' +
                '                                <div class="handle">\n' +
                '                                     <span></span>\n' +
                '                                </div>\n' +
                '                                <div class="menu-item">\n' +
                '                                    <a href="#" class="delete-menu">\n' +
                '                                        <i class="fa fa-times"></i>\n' +
                '                                    </a>\n' +
                '                                    <input type="text" name="sub_title_' + index + '[]" placeholder="Menü Adı">\n' +
                '                                    <input type="text" name="sub_url_' + index + '[]" placeholder="Menü Linki">\n' +
                '                                </div>\n' +
                '                            </li>');
            e.preventDefault();
        });

        $(document.body).on('click', '.delete-menu', function(e) {
            if ($('#menu li').length === 1) {
                alert('En az 1 menü içeriği kalmak zorundadır!');
            } else {
                $(this).closest('li').remove();
            }
            e.preventDefault();
        });

    });
</script>
<?php require adminView('static/footer'); ?>