<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Edit Category (#<?= $row['comment_ID'] ?>)
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>


<div class="box- box-content" tab>

    <form action="" method="post" class="form label">
        <div>
            <div>
                <ul>
                    <li>
                        <div style="background-color: rgba(13, 136, 193, 0.15); padding:15px; border:1px solid #0d88c1">
                            Written by <strong> <?= $row['user_name'] ? $row['user_name'] : $row['comment_name'] ?> </strong> <?= timeConvert($row['comment_date']) ?> for <a style="text-decoration: underline;" href="<?= siteURL('blog/' . $row['post_url']) ?>"> <strong> <?= $row['post_title'] ?></strong> </a>
                        </div>
                    </li>
                    <li>
                        <label>Comment Name</label>
                        <div class="form-content">
                            <input type="text" name="comment_name" value="<?= post('comment_name') ? post('comment_name') : $row['comment_name'] ?>" placeholder="Comment Name">
                        </div>
                    </li>
                    <li>
                        <label>Comment Email</label>
                        <div class="form-content">
                            <input type="text" name="comment_email" value="<?= post('comment_email') ? post('comment_email') : $row['comment_email'] ?>" placeholder="Comment Email">
                        </div>
                    </li>

                    <li>
                        <label>Comment Content</label>
                        <div class="form-content">
                            <textarea name="comment_content" id="comment_content" cols="30" rows="10" placeholder="Comment Content"><?= post('comment_content') ? post('comment_content') : $row['comment_content'] ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Comment Status</label>
                        <div class="form-content">
                            <select name="comment_status" id="comment_status">
                                <option <?= post('comment_status') ? (post('comment_status') == 1 ? 'selected' : null) : ($row['comment_status'] == 1 ? 'selected' : null)  ?> value="1">Unapproved</option>
                                <option <?= post('comment_status') ? (post('comment_status') == 2 ? 'selected' : null) : ($row['comment_status'] == 2 ? 'selected' : null)  ?> value="2">Approved</option>
                            </select>
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