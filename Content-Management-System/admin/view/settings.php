<?php require adminView('static/header') ?>
<div class="box-">
    <h1>
        Settings
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label>Site Title</label>
                <div class="form-content">
                    <input type="text" name="settings[title]" value="<?= setting('title') ?>">
                </div>
            </li>
            <li>
                <label>Site Description</label>
                <div class="form-content">
                    <input type="text" name="settings[description]" value="<?= setting('description') ?>">
                </div>
            </li>
            <li>
                <label>Site Keywords</label>
                <div class="form-content">
                    <input type="text" name="settings[keywords]" value="<?= setting('keywords') ?>">
                </div>
            </li>
            <li>
                <label>Site Theme</label>
                <div class="form-content">
                    <select name="settings[theme]" id="theme">
                        <option value=" ">- Chose a theme -</option>
                        <?php foreach ($themes as $theme) : ?>
                            <option <?= setting('theme') == $theme ? 'selected' : null ?> value="<?= $theme ?>"><?= $theme ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>
        </ul>
        <h1>Maintenance Mode</h1> <br>
        <ul>
            <li>
                <label>Mainteance Mode Situation:</label>
                <div class="form-content">
                    <select name="settings[mainteance]" id="mainteance">
                        <option <?= setting('mainteance') == 1 ? 'selected' : null ?> value="1"> NO </option>
                        <option <?= setting('mainteance') == 2 ? 'selected' : null ?> value="2"> YES </option>
                    </select>
                </div>
            </li>
            <li>
                <label>Mainteance Mode Title</label>
                <div class="form-content">
                    <input type="text" name="settings[mainteance_title]" placeholder=" Mainteance Mode Title">
                </div>
            </li>
            <li>
                <label>Mainteance Mode Description</label>
                <div class="form-content">
                    <textarea name="settings[mainteance_description]" cols="30" rows="5" placeholder="Mainteance Mode Description"></textarea>
                </div>
            </li>
        </ul>
        <ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Save Settings</button>
            </li>
        </ul>
    </form>
</div>

<?php require adminView('static/footer') ?>