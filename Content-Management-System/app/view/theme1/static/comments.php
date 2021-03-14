<div id="comments">
    <div class="media comment-box">
        <div class="media-left">
            <a href="#">
                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
            </a>
        </div>
        <div class="media-body">
            <h6 class="media-heading" style="display: flex; justify-content: space-between; align-items: center;">
                <?php echo $comment['comment_name'] ?>
                <span style="color:#aaa; font-size:12px; font-weight:400"><?= $comment['comment_date'] . ' (' . timeConvert($comment['comment_date']) . ')' ?></span>
            </h6>
            <p><?= htmlspecialchars_decode($comment['comment_content']) ?></p>

        </div>
    </div>
</div>