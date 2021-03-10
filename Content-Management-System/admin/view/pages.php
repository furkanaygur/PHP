<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Pages
        <?php if (!permission('pages', 'add')) : ?>
            <a href="<?= adminURL('add-page') ?>">Add New</a>
        <?php endif; ?>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Page Title</th>
                <th>Page Content</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <p>
                            <?= $row['page_title'] ?>
                        </p>

                    </td>
                    <td style="max-width: 400px;">
                        <?= htmlspecialchars_decode(substr($row['page_content'], 0, 500)) ?>
                        <?php if (strlen($row['page_content']) > 500) : ?>
                            <a href="<?= adminURL('edit-page?id=') . $row['page_ID'] ?>">...Read More</a>
                        <?php endif; ?>
                    </td>
                    <td title="<?= $row['page_date'] ?>">
                        <?= timeConvert($row['page_date']) ?>
                    </td>
                    <td>
                        <a href="<?= siteURL('page/' . $row['page_url']) ?>" class="btn" target="_blank">View</a>
                        <a href="<?= adminURL('edit-page?id=') . $row['page_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=pages&column=page_ID&id=') . $row['page_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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