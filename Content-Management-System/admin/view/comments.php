<?php require adminView('static/header') ?>

<style>
    .filter {
        background-color: #fff;
        box-shadow: 1px 3px 4px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: .5rem;
        overflow: hidden;

    }

    .filter ul li {
        float: left;
        padding: 0 15px;
    }

    .filter ul li a {
        display: block;
        line-height: 35px;
        color: #444;
        padding: 0 5px;
    }

    .filter ul li.active a {
        box-shadow: 0 -2px 0 0 #00a0d2 inset;
    }
</style>


<div class="box-">
    <h1>
        Comments
    </h1>
</div>
<div class="filter">
    <ul>
        <li class="<?= !get('status') ? 'active ' : null ?>">
            <a href="<?= adminURL('comments') ?>">All</a>
        </li>
        <li class="<?= get('status') == 2 ? 'active ' : null ?>">
            <a href="<?= adminURL('comments?status=2') ?>">Approved</a>
        </li>
        <li class="<?= get('status') == 1 ? 'active ' : null ?>">
            <a href="<?= adminURL('comments?status=1') ?>">Unapproved</a>
        </li>
    </ul>
</div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Comment Name</th>
                <th>Post Title</th>
                <th>Comment Content</th>
                <th>Comment Status</th>
                <th>Date</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <?= $row['comment_name'] . ' (' . $row['comment_email'] . ')' ?>
                    </td>
                    <td>
                        <a href="<?= siteURL('blog/' . $row['post_url']) ?>"> <?= $row['post_title'] ?> </a>
                    </td>
                    <td style="max-width: 400px;">
                        <?= htmlspecialchars_decode(substr($row['comment_content'], 0, 500)) ?>
                        <?php if (strlen($row['comment_content']) > 500) : ?>
                            <a href="<?= adminURL('edit-post?id=') . $row['post_ID'] ?>">...Read More</a>
                        <?php endif; ?>
                    </td>
                    <td style="width:120px">
                        <?php if ($row['comment_status'] == 2) : ?>
                            <span style="border-radius: 15px; padding: 5px; text-align:center; background-color: green; color:#fff;">Approved</span>
                        <?php else : ?>
                            <span style="border-radius: 15px; padding: 5px; text-align:center; background-color: red; color:#fff;">Unapproved</span>
                        <?php endif; ?>
                    </td>
                    <td title="<?= $row['comment_date'] ?>">
                        <?= timeConvert($row['comment_date']) ?>
                    </td>
                    <td>
                        <a href="<?= adminURL('edit-comment?id=') . $row['comment_ID'] ?>" id="updatebtn" class="btn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=comments&column=comment_ID&id=') . $row['comment_ID'] ?>" id="deletebtn" style="background-color: #ff3333;" class="btn">Delete</a>
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
                    <?= $db->showPagination(adminURL(route(1)) . '?' . $pageParam . '= [page]&status=' . get('status')); ?>
                </a>
            </li>

        </ul>
    </div>
<?php endif; ?>

<?php require adminView('static/footer') ?>