<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Reference
        <?php if (!permission('reference', 'add')) : ?>
            <a href="<?= adminURL('add-reference') ?>">Add New</a>
        <?php endif; ?>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Reference</th>
                <th>Content</th>
                <th>Categories</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <img style="width: 250px; height:auto; border-radius:5px;" src="<?= siteURL('upload/reference/') . $row['reference_url'] . '/' . $row['reference_image'] ?>" alt="">
                    </td>
                    <td>
                        <?= $row['reference_title'] ?>
                    </td>
                    <td style="max-width: 400px;">
                        <?= htmlspecialchars_decode(substr($row['reference_content'], 0, 500)) ?>
                        <?php if (strlen($row['reference_content']) > 500) : ?>
                            <a href="<?= adminURL('edit-post?id=') . $row['reference_ID'] ?>">...Read More</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $row['category_name'] ?>
                    </td>
                    <td title="<?= $row['reference_date'] ?>">
                        <?= timeConvert($row['reference_date']) ?>
                    </td>
                    <td>
                        <a href="<?= adminURL('reference-images?id=') . $row['reference_ID'] ?>" id="updatebtn" class="btn">Images</a>
                        <a href="<?= adminURL('edit-reference?id=') . $row['reference_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=reference&column=reference_ID&id=') . $row['reference_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if ($totalRecord > $pageLimit) : ?>
    <div class="pagination">
        <ul>
            <li>
                <a href="#">
                    <?= $db->showPagination(adminURL(route(1)) . '?' . $pageParam . '= [page]'); ?>
                </a>
            </li>

        </ul>
    </div>
<?php endif; ?>

<?php require adminView('static/footer') ?>