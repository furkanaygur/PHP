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
        <h1>Search Settings</h1> <br>
        <ul>
            <li>
                <label>Search ınput placeholder:</label>
                <div class="form-content">
                    <input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>" placeholder="Search ınput placeholder">
                </div>
            </li>
        </ul>
        <h1>Home Page Settings</h1> <br>
        <ul>
            <li>
                <label>Welcome Title:</label>
                <div class="form-content">
                    <input type="text" name="settings[welcome_title]" value="<?= setting('welcome_title') ?>" placeholder="Welcome Title">
                </div>
            </li>
            <li>
                <label>Welcome Text:</label>
                <div class="form-content">
                    <input type="text" name="settings[welcome_text]" value="<?= setting('welcome_text') ?>" placeholder="Welcome text">
                </div>
            </li>
        </ul>

        <h1>Footer Settings</h1> <br>
        <ul>
            <li>
                <label>Search Input Placeholder:</label>
                <div class="form-content">
                    <input type="text" name="settings[footer_about]" value="<?= setting('footer_about') ?>" placeholder="Footer Input">
                </div>
            </li>
        </ul>
        <h1>Soical Media Settings</h1> <br>
        <ul>
            <li>
                <label>Facebook URL:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_facebook]" value="<?= setting('soical_facebook') ?>" placeholder="Facebook URl:">
                </div>
                <label>Facebook Name:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_facebook_name]" value="<?= setting('soical_facebook_name') ?>" placeholder="Facebook Name">
                </div>
            </li>
            <li>
                <label>Twitter URL:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_twitter]" value="<?= setting('soical_twitter') ?>" placeholder="Twitter URL">
                </div>
                <label>Twitter Name:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_twitter_name]" value="<?= setting('soical_twitter_name') ?>" placeholder="Twitter Name">
                </div>
            </li>
            <li>
                <label>Instagram URL:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_instagram]" value="<?= setting('soical_instagram') ?>" placeholder="Instagram URL">
                </div>
                <label>Instagram Name:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_instagram_name]" value="<?= setting('soical_instagram_name') ?>" placeholder="Instagram Name">
                </div>
            </li>
            <li>
                <label>Github URL:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_github]" value="<?= setting('soical_github') ?>" placeholder="Github URL">
                </div>
                <label>Gıthub Name:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_github_name]" value="<?= setting('soical_github_name') ?>" placeholder="Github Name">
                </div>
            </li>
            <li>
                <label>Linkedin URL:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_linkedin]" value="<?= setting('soical_linkedin') ?>" placeholder="Linkedin URL">
                </div>
                <label>Linkedin Name:</label>
                <div class="form-content">
                    <input type="text" name="settings[soical_linkedin_name]" value="<?= setting('soical_linkedin_name') ?>" placeholder="Linkedin Name">
                </div>
            </li>

        </ul>

        <h1>Footer Settings</h1> <br>
        <ul>
            <li>
                <label>Search Input Placeholder:</label>
                <div class="form-content">
                    <input type="text" name="settings[footer_about]" value="<?= setting('footer_about') ?>" placeholder="Footer Input Placeholder">
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
                    <input type="text" name="settings[mainteance_title]" placeholder="Mainteance Mode Title">
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