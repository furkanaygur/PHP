<?php require adminView('static/header') ?>


<style>
    .table-sortable tr td:first-child {
        position: relative;
        padding-left: 20px;
    }

    .table-sortable tr td:first-child:before {
        content: '';
        width: 20px;
        height: 50%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: -10px;
        background-color: #999;
        cursor: move;
    }
</style>


<div class="box-">
    <h1>Category Settings
        <?php if (!permission('categories', 'add')) : ?>
            <a href="<?= adminURL('add-category') ?>">Add New</a>
        <?php endif; ?>
    </h1>
</div>
<div class="table">
    <table>
        <thead>
            <tr>
                <th>Categry Name</th>
                <th class="hide">Added Date</th>
                <th class="hide">Operation</th>
            </tr>
        </thead>
        <tbody class="table-sortable" data-table="categories" data-where="category_ID" data-column="category_order">
            <?php foreach ($rows as $row) : ?>
                <tr id="id_<?= $row['category_ID'] ?>">
                    <td>
                        <a href="<?= adminURL('edit-category?id=') . $row['category_ID'] ?>" class="title">
                            <?= $row['category_name'] ?>
                        </a>
                    </td>

                    <td>
                        <span class="date"><?= timeConvert($row['category_date']) ?></span>
                    </td>
                    <td class="hide">
                        <a href="<?= adminURL('edit-category?id=') . $row['category_ID'] ?>" class="btn" id="updatebtn">Update</a>
                        <a onclick="return confirm('Are you sure?')" href="<?= adminURL('delete?table=categories&column=category_ID&id=') . $row['category_ID'] ?>" style="background-color: #ff3333;" class="btn" id="deletebtn">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require adminView('static/footer') ?>