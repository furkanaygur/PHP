<?php require adminView('static/header'); ?>

<div class="content">

    <div class="box-">
        <h1>
            Read Contact (#<?= $id ?>)
        </h1>
    </div>
    <?php if ($row['contact_read'] == 1) : ?>
        <div class="message success box-">
            <?= 'Posted ' . timeConvert($row['contact_date']) ?> <br>
            <strong><?= $row['user_name'] ?> </strong> <?= ' read ' . timeConvert($row['contact_read_date']) ?>
        </div>
    <?php endif; ?>
    <div class="box-">

        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Name:</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_name'] ?>
                    </div>
                </li>
                <li>
                    <label>Email:</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_email'] ?>
                    </div>
                </li>
                <?php if ($row['contact_phone']) : ?>
                    <li>
                        <label>Phone:</label>
                        <div class="form-content" style="padding-top: 12px;">
                            <?= $row['contact_phone'] ?>
                        </div>
                    </li>
                <?php endif; ?>
                <li>
                    <label>Message Subject:</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_subject'] ?>
                    </div>
                </li>
                <li>
                    <label>Message Content:</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= nl2br($row['contact_content']); ?>
                    </div>
                </li>
            </ul>
        </form>
    </div>

</div>

<?php require adminView('static/footer'); ?>