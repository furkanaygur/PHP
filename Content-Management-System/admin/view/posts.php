<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Posts
        <?php if (!permission('posts', 'add')) : ?>
            <a href="<?= adminURL('add-post') ?>">Add New</a>
        <?php endif; ?>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Post Title</th>
                <th>Post Content</th>
                <th>Post Categories</th>
                <th>Post Status</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <?= $row['post_title'] ?>
                    </td>
                    <td style="max-width: 400px;">
                        <?= htmlspecialchars_decode(substr($row['post_content'], 0, 500)) ?>
                        <?php if (strlen($row['post_content']) > 500) : ?>
                            <a href="<?= adminURL('edit-post?id=') . $row['post_ID'] ?>">...Read More</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($row['post_categories'])) : ?>
                            <?= $row['post_categories'] ?>
                        <?php else : ?>
                            <span style="font-size:10px; margin-left:10px; color:#999">Add a category</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $row['post_status'] == 2 ? 'Puslished' : 'Draft' ?>
                    </td>
                    <td title="<?= $row['post_date'] ?>">
                        <?= timeConvert($row['post_date']) ?>
                    </td>
                    <td>
                        <a href="<?= siteURL('blog/' . $row['post_url']) ?>" class="btn" target="_blank">View</a>
                        <a href="<?= adminURL('edit-post?id=') . $row['post_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=posts&column=post_ID&id=') . $row['post_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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