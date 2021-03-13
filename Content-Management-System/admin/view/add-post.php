<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Add Post
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
                <a href="#">Post Seo Settings</a>
            </li>
        </ul>
    </div>

    <form action="" method="post" class="form label">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Post Title</label>
                        <div class="form-content">
                            <input type="text" name="post_title" value="<?= post('post_title') ?>" placeholder="Post Title">
                        </div>
                    </li>
                    <li>
                        <label>Post Short Content</label>
                        <div class="form-content">
                            <textarea class="editor" type="text" name="post_short_content" placeholder="Post short_Content" rows="5"><?= post('post_short_content') ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Post Content</label>
                        <div class="form-content">
                            <textarea class="editor" type="text" name="post_content" placeholder="Post Content" rows="5"><?= post('post_content') ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Post Categories</label>
                        <div class="form-content">
                            <select name="post_categories[]" multiple size="6">
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['category_ID'] ?>"> <?= $category['category_name'] ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Post Status</label>
                        <div class="form-content">
                            <select name="post_status">
                                <option value="1"> Draft </option>
                                <option value="2"> Publish </option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Post Tags</label>
                        <div class="form-content" style="min-width: 410px;">
                            <input class="tagsinput" type="text" name="post_tags" placeholder="Post Tags" rows="5" value="<?= post('post_tags') ?>">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Post Seo URL</label>
                        <div class="form-content">
                            <input type="text" name="post_url" value="<?= post('post_url') ?>" placeholder="Post Seo URL">
                        </div>
                    </li>
                    <li>
                        <label>Post Seo Title</label>
                        <div class="form-content">
                            <input type="text" name="post_seo[title]" placeholder="Post Seo Title">
                        </div>
                    </li>
                    <li>
                        <label>Post Seo Description</label>
                        <div class="form-content">
                            <textarea type="text" name="post_seo[description]" placeholder="Post Seo Description" rows="5"></textarea>
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
    var tags = ['<?= implode("','", $tagsArr) ?>']
</script>

<?php require adminView('static/footer') ?>