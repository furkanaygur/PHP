<?php require adminView('static/header'); ?>
<div class="content">

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

                    <button type="submit" name="submit" value="1">Save Changes</button>
                </li>
            </ul>
        </form>
    </div>

</div>

<?php require adminView('static/footer'); ?>