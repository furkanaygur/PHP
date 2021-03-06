<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Users
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th class="hide">User Email</th>
                <th>Role</th>
                <th>Added Date</th>
                <th>Opperations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <a href="#" class="title">
                            <?= $row['user_name'] ?>
                        </a>

                    </td>
                    <td class="hide">
                        <?= $row['user_email'] ?>
                    </td>
                    <td>
                        <?= user_ranks($row['user_rank']) ?>
                    </td>
                    <td title="<?= $row['user_date'] ?>">
                        <span class="date"><?= timeConvert($row['user_date']) ?></span>
                    </td>
                    <td>
                        <a href="<?= adminURL('edit-user?id=') . $row['user_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=users&column=user_ID&id=') . $row['user_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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