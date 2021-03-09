<?php require adminView('static/header'); ?>

<div class="content">

    <div class="box-">
        <h1>
            Read Contact (#<?= $id ?>)
        </h1>
    </div>
    <div class="box-container container-50">
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
    <?php if (!permission('contact', 'send')) : ?>
        <div class="box-container container-50">
            <div class="box" id="div-3">
                <h3>
                    Answer
                </h3>
                <div class="box-content">
                    <div style="display: none;" class="message success box-" id="success"></div>
                    <div style="display: none;" class="message error box-" id="error"></div>
                    <form action="" class="form" id="email-form" onsubmit="return false;">
                        <input type="hidden" name="name" value="<?= $row['contact_name'] ?>">
                        <ul>
                            <li>
                                <label for="email" class="title">Contact Email</label>
                                <input type="text" id="email" value="<?= $row['contact_email'] ?>" name="email">
                            </li>
                            <li>
                                <label for="subject" class="title">Message Subject</label>
                                <input type="text" id="subject" value="RE: <?= $row['contact_subject'] ?>" name="subject">
                            </li>
                            <li>
                                <label for="message" class="title">Your Message</label>
                                <textarea name="message" id="message" cols="30" rows="5"></textarea>
                            </li>
                            <li>
                                <button onclick="sendEmail('#email-form')" type="submit">Submit</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


<?php require adminView('static/footer'); ?>