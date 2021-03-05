<?php require adminView('static/header') ?>
<div class="box-">
    <h1>Menu Settings
        <a href="<?= adminURL('add-menu') ?>">Add New</a>
    </h1>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th class="hide">Added Date</th>
                <th class="hide">Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td>
                        <a href="#" class="title">
                            <?= $row['menu_title'] ?>
                        </a>
                    </td>

                    <td>
                        <span class="date"><?= $row['menu_date'] ?></span>
                    </td>
                    <td class="hide">
                        <a href="<?= adminURL('edit-menu?id=') . $row['menu_ID'] ?>" class="btn" id="updatebtn">Update</a>
                        <a href="<?= adminURL('delete?table=menu&column=menu_id&id=') . $row['menu_ID'] ?>" style="background-color: #ff3333;" class="btn" id="deletebtn">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require adminView('static/footer') ?>