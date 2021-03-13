<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Add Page
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>


<style>
    .admin-tab ul {
        background: #fff;
        box-shadow: 0 0 10x 0 rgba(0, 0, 0, .15);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .admin-tab ul li {
        float: left;
        margin: 0 10px;
    }

    .admin-tab ul li a {
        line-height: 40px;
        padding: 0 10px;
        color: #222;
        display: block;
        font-weight: bold;
    }

    .admin-tab ul li.active a {
        box-shadow: 0 2px 0 0 #00a0d2 inset;
    }

    .box-content {
        background: #fff;
    }

    .box- form {
        padding-left: 20px;
        padding-bottom: 5px;
    }
</style>

<div class="box- box-content" tab>

    <div class="admin-tab">
        <ul tab-list>
            <li>
                <a href="#">General Settings</a>
            </li>
            <li>
                <a href="#">Seo Settings</a>
            </li>
        </ul>
    </div>

    <form action="" method="post" class="form label">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Page Title</label>
                        <div class="form-content">
                            <input type="text" name="page_title" value="<?= post('page_title') ?>" placeholder="Page Title">
                        </div>
                    </li>
                    <li>
                        <label>Page Content</label>
                        <div class="form-content">
                            <textarea class="editor" type="text" name="page_content" placeholder="Page Content" rows="5"><?= post('page_content') ?></textarea>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Page Seo URL</label>
                        <div class="form-content">
                            <input type="text" name="page_url" value="<?= post('page_url') ?>" placeholder="Page Seo URL">
                        </div>
                    </li>
                    <li>
                        <label>Page Seo Title</label>
                        <div class="form-content">
                            <input type="text" name="page_seo[title]" placeholder="Page Seo Title">
                        </div>
                    </li>
                    <li>
                        <label>Page Seo Description</label>
                        <div class="form-content">
                            <textarea type="text" name="page_seo[description]" placeholder="Page Seo Description" rows="5"></textarea>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Submit</button>
            </li>
        </ul>
    </form>
</div>


<?php require adminView('static/footer') ?>