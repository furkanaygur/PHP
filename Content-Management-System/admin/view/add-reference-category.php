<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Add Reference Category
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
                        <label>Category Name</label>
                        <div class="form-content">
                            <input type="text" name="category_name" value="<?= post('category_name') ?>" placeholder="Category Name">
                        </div>
                    </li>
                    <li>
                        <label>Category Template</label>
                        <div class="form-content">
                            <input type="text" name="category_template" value="<?= post('category_template') ?>" placeholder="Category Template">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Seo URL</label>
                        <div class="form-content">
                            <input type="text" name="category_url" value="<?= post('category_url') ?>" placeholder="Seo URL">
                        </div>
                    </li>
                    <li>
                        <label>Seo Title</label>
                        <div class="form-content">
                            <input type="text" name="category_seo[title]" placeholder="Seo Title">
                        </div>
                    </li>
                    <li>
                        <label>Seo Description</label>
                        <div class="form-content">
                            <textarea type="text" name="category_seo[description]" placeholder="Seo Description" rows="5"></textarea>
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