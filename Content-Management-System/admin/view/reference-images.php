<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        <?= $row['reference_title'] ?> - Images
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
                <a href="#">Add Images</a>
            </li>
        </ul>
    </div>

    <form action="" method="post" class="form label" enctype="multipart/form-data">
        <div>
            <div tab-content>
                <ul>
                    <li>
                        <label>Images</label>
                        <div class="form-content">
                            <input type="file" name="images[]" multiple>
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

<?php if ($query) : ?>
    <div class="box-">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as  $image) : ?>
                        <tr>
                            <td>
                                <img width="500" src="<?= siteURL('upload/reference/') .  $row['reference_url'] . '/' . $image['image_url'] ?>">
                            </td>
                            <td>
                                <a href="<?= adminURL('edit-reference-image?id=' .  $image['image_ID']) ?>" id="updatebtn" class="btn">Update</a>
                                <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=reference_images&column=image_ID&id=') . $image['image_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>


<?php require adminView('static/footer') ?>