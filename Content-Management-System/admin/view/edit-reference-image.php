<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        <?= $row['reference_title'] ?> - Edit İmage (#<?= get('id') ?>)
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
        </ul>
    </div>

    <form action="" method="post" class="form label" enctype="multipart/form-data">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Image Title</label>
                        <div class="form-content">
                            <input type="text" name="image_content[title]" value="<?= isset($content['title']) ? $content['title'] : null ?>" placeholder="Image Title">
                        </div>
                    </li>
                    <li>
                        <label>Image Description</label>
                        <div class="form-content">
                            <textarea name="image_content[description]" id="description" cols="30" rows="10" placeholder="Image Description"><?= isset($content['description']) ? $content['description'] : null ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Change Image</label>
                        <div class="form-content">
                            <input type="file" name="image">
                            <div style="margin-top:20px">
                                <label>Current Image; </label>
                                <img width="500" src="<?= siteURL('/upload/reference/' . $row['reference_url'] . '/' . $row['image_url']) ?>" alt="">
                            </div>
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