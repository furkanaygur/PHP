<?php require adminView('static/header'); ?>

<style>
    .permissions {
        background-color: #fff;
        border: 1px solid #ccc;
        max-width: 400px;
        padding: 15px;
    }

    .permissions h3 {
        font-weight: bold;
    }

    .permissions .list:not(:last-child) {
        margin-bottom: 1.5rem;
    }

    .permissions .list label {
        float: none !important;
        display: inline-block;
        width: auto !important;
        font-weight: normal !important;
        margin-right: 10px;
    }

    .permissions .list label input {
        cursor: pointer;
    }
</style>

<div class="box-">
    <h1>
        Update User (#<?= $id ?>)
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label for="user_name">User Name</label>
                <div class="form-content">
                    <input type="text" value="<?= post('user_name') ? post('user_name') : $row['user_name'] ?>" id="user_name" name="user_name" placeholder="User Name">
                </div>
            </li>
            <li>
                <label for="user_email">User Email</label>
                <div class="form-content">
                    <input type="text" value="<?= post('user_email') ? post('user_email') : $row['user_email'] ?>" id="user_email" name="user_email" placeholder="User Email">
                </div>
            </li>
            <li>
                <label for="select">User Role</label>
                <div class="form-content">
                    <select name="user_rank" id="user_rank">
                        <option value=""> -Choose Role- </option>
                        <?php foreach (user_ranks() as $id => $rank) : ?>
                            <option <?= (post('user_rank') ? post('user_rank') : $row['user_rank']) == $id ? 'selected' : null ?> value="<?= $id ?>"><?= $rank ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>
            <li>
                <label for="select">Permissions</label>
                <div class="form-content">
                    <div class="permissions">
                        <?php foreach ($menus as $url => $menu) : ?>
                            <div>
                                <h3><?= $menu['title'] ?></h3>
                            </div>
                            <div class="list">
                                <?php foreach ($menu['permissions'] as $key => $permission) : ?>
                                    <label for="<?= $permission . $url ?>">
                                        <input type="checkbox" value="1" <?= (isset($permissions[$url][$key]) && $permissions[$url][$key] == 1) ? 'checked' : null ?> name="user_permissions[<?= $url ?>][<?= $key ?>]" id="<?= $permission . $url ?>">

                                        <?= $permission ?>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <!-- <li>
                    <label for="description">Description</label>
                    <div class="form-content">
                        <textarea name="description" id="description" cols="30" rows="5"></textarea>
                        <p>
                            In a few words, explain what this site is about.
                        </p>
                    </div>
                </li>
                <li>
                    <div class="label">
                        Membership
                    </div>
                    <div class="form-content">
                        <label class="not" for="membership">
                            <input type="checkbox" value="1" id="membership"> Anyone can register
                        </label>
                    </div>
                </li>
                <li>
                    <label for="select">New User Default Role</label>
                    <div class="form-content">
                        <select name="select" id="select">
                            <option value="">User</option>
                            <option value="">Admin</option>
                            <option value="">Moderator</option>
                        </select>
                        <p>
                            In a few words, explain what this site is about.
                        </p>
                    </div>
                </li> -->
            <li class="submit">

                <button type="submit" name="submit" value="1">Submit</button>
            </li>
        </ul>
    </form>
</div>

<?php require adminView('static/footer'); ?>