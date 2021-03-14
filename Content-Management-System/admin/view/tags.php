<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Tags
        <?php if (!permission('tags', 'add')) : ?>
            <a href="<?= adminURL('add-tag') ?>">Add New</a>
        <?php endif; ?>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Tag Name</th>
                <th>Use Count</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <p>
                            <?= $row['tag_name'] ?>
                        </p>

                    </td>
                    <td>
                        <p>
                            <?= $row['total'] ?>
                        </p>

                    </td>
                    <td>
                        <a href="<?= adminURL('edit-tag?id=') . $row['tag_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=tags&column=tag_ID&id=') . $row['tag_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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