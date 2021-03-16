<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Add Reference
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
        padding-right: 10px;
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

    <form action="" method="post" class="form label" enctype="multipart/form-data">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Reference Title</label>
                        <div class="form-content">
                            <input type="text" name="reference_title" value="<?= post('reference_title') ?>" placeholder="Reference Title">
                        </div>
                    </li>
                    <li>
                        <label>Reference Content</label>
                        <div class="form-content">
                            <textarea class="editor" type="text" name="reference_content" placeholder="Reference Content" rows="5"><?= post('reference_content') ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Reference Image</label>
                        <div class="form-content">
                            <input type="file" name="reference_image"></input>
                        </div>
                    </li>
                    <li>
                        <label>Reference Categories</label>
                        <div class="form-content">
                            <select name="reference_categories[]" multiple size="6">
                                <?php foreach ($categories as $category) : ?>
                                    <option <?= post('reference_categories') ? (in_array($category['category_ID'], post('reference_categories')) ? 'selected' : null) : null ?> value="<?= $category['category_ID'] ?>"> <?= $category['category_name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Reference Tags</label>
                        <div class="form-content" style="min-width: 410px;">
                            <input class="tagsinput" type="text" name="reference_tags" placeholder="Reference Tags" rows="5" value="<?= post('reference_tags') ?>">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Reference Seo URL</label>
                        <div class="form-content">
                            <input type="text" name="reference_url" value="<?= post('reference_url') ?>" placeholder="Reference Seo URL">
                        </div>
                    </li>
                    <li>
                        <label>Reference Seo Title</label>
                        <div class="form-content">
                            <input type="text" name="reference_seo[title]" placeholder="Reference Seo Title">
                        </div>
                    </li>
                    <li>
                        <label>Reference Seo Description</label>
                        <div class="form-content">
                            <textarea type="text" name="reference_seo[description]" placeholder="Reference Seo Description" rows="5"></textarea>
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

<script>
    var tags = []
</script>

<?php require adminView('static/footer') ?>