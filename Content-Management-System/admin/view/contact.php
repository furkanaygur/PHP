<?php require adminView('static/header') ?>

<div class="box-">
    <h1>
        Contact
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th width="7">&nbsp;</th>
                <th>First Name - Last Name</th>
                <th>Message Subject</th>
                <th>Message Content</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <?php if ($row['contact_read'] == 1) : ?>
                            <div style="background-color:green; color:#fff;padding:3px 6px; border-radius:3px; text-align:center">
                                Read
                            </div>
                        <?php else : ?>
                            <div style="background-color:darkred; color:#fff;padding:3px 6px; border-radius:3px; text-align:center">
                                Unread
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p>
                            <?= $row['contact_name'] ?>
                            (<?= $row['contact_email'] ?>)
                        </p>
                        <?= $row['contact_phone'] ?>
                    </td>
                    <td>
                        <?= $row['contact_subject'] ?>
                    </td>
                    <td>
                        <?= $row['contact_content'] ?>
                    </td>
                    <td>
                        <?= timeConvert($row['contact_date']) ?>
                        <?php if ($row['contact_read_date']) : ?>
                            <div style="color: #999; font-size:12px">
                                <strong><?= $row['user_name'] ?></strong>
                                <?= 'read ' . timeConvert($row['contact_read_date']) ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= adminURL('edit-contact?id=') . $row['contact_ID'] ?>" id="updatebtn" class="btn">Read</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=contact&column=contact_ID&id=') . $row['contact_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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